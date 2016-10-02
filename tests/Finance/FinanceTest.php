<?php
namespace MathPHP;

class FinanceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProviderForPMT
     */
    public function testPMT(float $rate, int $periods, float $pv, float $fv, bool $beginning, float $pmt)
    {
        $this->assertEquals($pmt, Finance::pmt($rate, $periods, $pv, $fv, $beginning));
    }

    public function dataProviderForPMT()
    {
        return [
            [0.0, 1, 0, 0, false, 0.0],
            [0.0, 1, 1, 0, false, -1.0],
            [0.0, 1, -1, 0, false, 1.0],
            [0.0, 1, 1, 0, true, -1.0],
            [0.0, 1, -1, 0, true, 1.0],
            [0.0, 2, 1, 0, false, -0.5],
            [0.0, 2, -1, 0, false, 0.5],
            [0.0, 2, 1, 0, true, -0.5],
            [0.0, 2, -1, 0, true, 0.5],
            [0.05, 30, 250000, 0, false, -16262.858770069148],
            [0.05, 30, -250000, 0, false, 16262.858770069148],
            [0.05, 30, 250000, 0, true, -15488.436923875368],
            [0.05, 30, -250000, 0, true, 15488.436923875368],
            [0.04/12, 12*30, 85000, 0, false, -405.80300114563494],
            [0.04/12, 12*30, -85000, 0, false, 405.80300114563494],
            [0.04/12, 12*30, 85000, 0, true, -404.45481841757629],
            [0.04/12, 12*30, -85000, 0, true, 404.45481841757629],
            [0.035/12, 12*30, 475000, 0, false, -2132.9622670919189],
            [0.035/12, 12*30, -475000, 0, false, 2132.9622670919189],
            [0.035/12, 12*30, 475000, 0, true, -2126.7592193687524],
            [0.035/12, 12*30, -475000, 0, true, 2126.7592193687524],
            [0.035/12, 12*30, 475000, 100000, false, -2290.3402882340679],
            [0.035/12, 12*30, -475000, -100000, false, 2290.3402882340679],
            [0.035/12, 12*30, 475000, 100000, true, -2283.6795561951658],
            [0.035/12, 12*30, -475000, -100000, true, 2283.6795561951658],
            [0.10/4, 5*4, 0, 50000, false, -1957.3564367237279],
            [0.10/4, 5*4, 0, -50000, false, 1957.3564367237279],
            [0.10/4, 5*4, 0, 50000, true, -1909.6160358280276],
            [0.10/4, 5*4, 0, -50000, true, 1909.6160358280276],
            [0.035/12, 30*12, 265000, 0, false, -1189.9684226933862],
            [0.035/12, 5*12, 265000, 265000/2, false, -6844.7602923435943],
            [0.01/52, 3*52, -1500, 10000, false, -53.390735324685636],
            [0.04/4, 20*4, 1000000, 0, false, -18218.850112732187],
        ];
    }
}
