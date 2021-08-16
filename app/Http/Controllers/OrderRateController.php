<?php

namespace App\Http\Controllers;

use App\Repository\Eloquent\OrderCommentRepositoryInterface;
use App\Repository\Eloquent\OrderRateRepositoryInterface;
use App\Repository\OrderRateSendMsgInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class OrderRateController extends BaseController
{
    /**
     * @var OrderRateRepositoryInterface
     */
    private $orderRateRepository;
    /**
     * @var OrderCommentRepositoryInterface
     */
    private $orderRateCommentRepository;

    /**
     * @var OrderRateSendMsgInterface
     */
    private $orderMsgRepository;

    public function __construct(
        OrderRateRepositoryInterface $orderRateRepository,
        OrderCommentRepositoryInterface $orderRateCommentRepository,
        OrderRateSendMsgInterface $orderRateMsgRepository
    ) {
        $this->orderRateRepository = $orderRateRepository;
        $this->orderRateCommentRepository = $orderRateCommentRepository;
        $this->orderMsgRepository = $orderRateMsgRepository;
    }

    /**
     * Сохранить рейтинг заказа
     *
     * @param $id
     * @param $rate
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveRate($id, $rate) {
        if($this->orderRateRepository->setRate($id, $rate)) {
            return response()->json($this->orderRateRepository->find($id));
        }
        abort(500);
    }

    /**
     * Получить рейтинг заказа
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRate($id) {
        $obj = $this->orderRateRepository->find($id);
        if(!$obj) abort(404);
        return response()->json($obj);
    }

    /**
     * Сохранить комментарий к заказу
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveComment(Request $request, $id) {
        return response()->json(
            $this->orderRateCommentRepository->setComment($id, $request->input('comment'))
        );
    }

    /**
     * Получить комментарий к заказу
     */
    public function getComment($id) {
        return response()->json(['comment' => $this->orderRateCommentRepository->getComment($id)]);
    }

    /**
     * Админка - сообщение пользователю с просьбой проставить оценку
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveSendMessage(Request $request) {
        return response()->json($this->orderMsgRepository->set($request->input('message')));
    }
    public function getSendMessage() {
        return response()->json(['message' => $this->orderMsgRepository->get()]);
    }
}
