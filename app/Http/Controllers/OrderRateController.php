<?php

namespace App\Http\Controllers;

use App\Repository\Eloquent\OrderMsgRepositoryInterface;
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
     * @var OrderMsgRepositoryInterface
     */
    private $orderRateMsgRepository;

    /**
     * @var OrderRateSendMsgInterface
     */
    private $orderMsgRepository;

    public function __construct(
        OrderRateRepositoryInterface $orderRateRepository,
        OrderMsgRepositoryInterface $orderMsgRepository,
        OrderRateSendMsgInterface $orderRateMsgRepository
    ) {
        $this->orderRateRepository = $orderRateRepository;
        $this->orderRateMsgRepository = $orderMsgRepository;
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
        } else {
            abort(500);
        }
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
     */
    public function saveComment(Request $request, $id) {
        $message = $request->input('message');
        error_log('message/'.$id.'/'.$message);
    }

    /**
     * Получить комментарий к заказу
     */
    public function getComment($id) {
        error_log('message/'.$id);
        return $this->orderRateMsgRepository->getMsg($id);
    }

    /**
     * Админка - сообщение пользователю с просьбой проставить оценку
     *
     * @param Request $request
     */
    public function saveSendMessage(Request $request) {
        $this->orderRateMsgRepository->set($request->input('message'));
    }
    public function getSendMessage() {
        $this->orderRateMsgRepository->get();
    }
}
