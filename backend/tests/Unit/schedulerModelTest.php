<?php
namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
class schedulerModelTest extends TestCase{

    public function test_schedule_generation()
    {
        $service = new \App\Models\schedulerModel();

        $activities = [
            ['name' => 'A', 'durationMinutes' => 60],
            ['name' => 'B', 'durationMinutes' => 80],
        ];

        $result = $service->generateSchedule($activities);

        $this->assertNotEmpty($result);
        $this->assertArrayHasKey('date', $result[0]);
    }

}