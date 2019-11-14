<?php

namespace Sportic\Omniresult\Common\Tests\Common\Content;

use Sportic\Omniresult\Common\Content\ListContent;
use Sportic\Omniresult\Common\Tests\AbstractTest;

/**
 * Class ListContentTest
 * @package Sportic\Omniresult\Common\Tests\Common\Content
 */
class ListContentTest extends AbstractTest
{
    public function testInitWithPagination()
    {
        $content = new ListContent(['pagination' => ['all' => 9]]);
        $pagination = $content->getPagination();

        self::assertSame(1, $pagination['current']);
        self::assertSame(9, $pagination['all']);
    }
}
