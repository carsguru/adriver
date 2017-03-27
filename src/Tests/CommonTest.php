<?php

namespace CarsGuru\Adriver\Tests;

use CarsGuru\Adriver\Common;
use PHPUnit\Framework\TestCase;

class CommonTest extends TestCase
{
    /**
     * @var Common
     */
    private $library;

    protected function setUp()
    {
        $this->library = new Common();
    }

    protected function tearDown()
    {
        $this->library = null;
    }


    /**
     * @dataProvider dataReferer
     *
     * @param $in
     * @param $out
     */
    public function testExtractReferer($in, $out)
    {
        self::assertSame($out, $this->library->extractReferer($in));
    }

    public function dataReferer()
    {
        return [
            [
                'http://servers1.adriver.ru/images/0004960/0004960820/0/credit_button.mobile.html',
                null
            ],
            [
                'http://servers1.adriver.ru/images/0004960/0004960820/0/credit_button.mobile.html?test=xpid',
                null
            ],
            [
                'http://servers1.adriver.ru/images/0004960/0004960820/0/credit_button.mobile.html?html_params=xpid%3DDf63FcQo55vq_vt2hIN0z_JOVlpi_OLj-Hc_RsimpUZHtgpo1QTCkh4td78H2I1H3n4UuyVGQyoJNKg%26target%3D_blank%26bid%3D4960820%26sid%3D91205%26width%3D270%26height%3D35%26rnd%3D9552941%26pz%3D3%26ad%3D620462%26bt%3D52%26bn%3D15%26ar_sliceid%3D1902581%26ntype%3D0%26nid%3D0%26url%3D//ad.adriver.ru/cgi-bin/click.cgi%253Fsid%253D91205%2526ad%253D620462%2526bid%253D4960820%2526bt%253D52%2526bn%253D15%2526pz%253D3%2526xpid%253DDf63FcQo55vq_vt2hIN0z_JOVlpi_OLj-Hc_RsimpUZHtgpo1QTCkh4td78H2I1H3n4UuyVGQyoJNKg%2526custom%253D1%25253D560000%25253B110%25253D1920%25253B111%25253D1080%2526rleurl%253D%26CompPath%3Dhttp%253A//servers1.adriver.ru/images/0004960/0004960820/0/%26ar_pass%3D',
                null
            ],
            [
                'http://servers1.adriver.ru/images/0004960/0004960820/0/credit_button.mobile.html?html_params=xpid%3DDf63FcQo55vq_vt2hIN0z_JOVlpi_OLj-Hc_RsimpUZHtgpo1QTCkh4td78H2I1H3n4UuyVGQyoJNKg%26target%3D_blank%26bid%3D4960820%26sid%3D91205%26width%3D270%26height%3D35%26rnd%3D9552941%26pz%3D3%26ad%3D620462%26bt%3D52%26bn%3D15%26ar_sliceid%3D1902581%26ntype%3D0%26nid%3D0%26url%3D//ad.adriver.ru/cgi-bin/click.cgi%253Fsid%253D91205%2526ad%253D620462%2526bid%253D4960820%2526bt%253D52%2526bn%253D15%2526pz%253D3%2526xpid%253DDf63FcQo55vq_vt2hIN0z_JOVlpi_OLj-Hc_RsimpUZHtgpo1QTCkh4td78H2I1H3n4UuyVGQyoJNKg%2526ref%253Dhttp%253A%25252f%25252fcarsguru.net%25252fused%25252f16032233%25252fview.html%25253f%252526view%25253dmobile%2526custom%253D1%25253D560000%25253B110%25253D1920%25253B111%25253D1080%2526rleurl%253D%26CompPath%3Dhttp%253A//servers1.adriver.ru/images/0004960/0004960820/0/%26ar_pass%3D',
                'http://carsguru.net/used/16032233/view.html?&view=mobile'
            ],
        ];
    }
}
