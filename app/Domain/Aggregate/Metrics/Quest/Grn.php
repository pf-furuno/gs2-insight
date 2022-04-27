<?php

namespace App\Domain\Aggregate\Metrics\Quest;

use App\Domain\Aggregate\Metrics\AbstractMetrics;
use App\Domain\Aggregate\Metrics\Common\GrnLoader;
use App\Domain\Aggregate\Metrics\Common\Result\LoadResult;
use DatePeriod;
use JetBrains\PhpStorm\Pure;

class Grn extends AbstractMetrics
{
    #[Pure] public function __construct(
        DatePeriod $period,
        string $datasetName,
        string $credentials,
    )
    {
        parent::__construct(
            $period,
            $datasetName,
            $credentials,
        );
    }

    public function load(): LoadResult {
        $service = 'quest';

        $totalBytesProcessed = 0;

        $namespaces = GrnLoader::load(
            $this->createClient(),
            GrnLoader::rootGrn($service),
            GrnLoader::buildQuery(
                $service,
                'namespaceName',
                $this->table(),
                $this->timeRange(),
                [],
            ),
            'namespace',
        );
        $totalBytesProcessed += $namespaces->totalBytesProcessed;
        foreach ($namespaces->grns as $namespace) {
            $questGroupModels = GrnLoader::load(
                $this->createClient(),
                $namespace,
                GrnLoader::buildQuery(
                    $service,
                    'questGroupName',
                    $this->table(),
                    $this->timeRange(),
                    [
                        'namespaceName' => $namespace["key"],
                    ],
                ),
                'questGroupModel',
            );
            $totalBytesProcessed += $questGroupModels->totalBytesProcessed;
            foreach ($questGroupModels->grns as $questGroup) {
                $questModels = GrnLoader::load(
                    $this->createClient(),
                    $questGroup,
                    GrnLoader::buildQuery(
                        $service,
                        'questName',
                        $this->table(),
                        $this->timeRange(),
                        [
                            'namespaceName' => $namespace["key"],
                            'questGroupName' => $questGroup["key"],
                        ],
                    ),
                    'questModel',
                );
                $totalBytesProcessed += $questModels->totalBytesProcessed;
            }
        }
        return new LoadResult(
            $totalBytesProcessed,
        );
    }
}
