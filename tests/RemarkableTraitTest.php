<?php

namespace Fuguevit\Commentable\Test;

use Fuguevit\Commentable\Remark;

class RemarkableTraitTest extends TestCase
{
    /**
     * Test remarkable trait can add remark.
     */
    public function test_add_remark()
    {
        $article = $this->createArticle();
        $article->addRemark(1, 'foo');

        $remark = Remark::where('user_id', 1)->where('content', 'foo')->first();
        $this->assertInstanceOf('Fuguevit\Commentable\Remark', $remark);
    }
}
