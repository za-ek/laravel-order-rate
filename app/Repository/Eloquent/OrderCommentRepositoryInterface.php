<?php
namespace App\Repository\Eloquent;

/**
 * Interface OrderCommentRepositoryInterface
 * @package App\Repository\Eloquent
 */
interface OrderCommentRepositoryInterface
{
    public function setComment($id, $comment);
    public function getComment($id);
}
