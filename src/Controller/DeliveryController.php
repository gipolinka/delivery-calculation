<?php

namespace App\Controller;

use App\Delivery\Infrastructure\Services\CalculateDelivery;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Delivery\Infrastructure\Form\ParcelType;
use App\Delivery\Domain\Entity\Parcel;

/**
 * @Route("/api",name="api_")
 */
class DeliveryController extends AbstractFOSRestController
{
    /**
     * @Route("/delivery-cost", name="delivery-cost", methods={"POST"})
     */
    public function cost(Request $request, CalculateDelivery $calculateDelivery): View
    {
        $parcel = new Parcel();
        $form = $this->createForm(ParcelType::class, $parcel);
        $form->submit($request->request->all());
        $view = $this->view($form);

        if ($form->isValid()) {
            $view->setData(['value' => $calculateDelivery->calc($parcel)]);
        }

        return $view;
    }
}
