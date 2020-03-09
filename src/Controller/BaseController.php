<?php


namespace App\Controller;



use FOS\RestBundle\Controller\FOSRestController;
use JMS\Serializer\SerializerInterface;




class BaseController extends FOSRestController
{

    public static function getSubscribedServices() {
        return array_merge(parent::getSubscribedServices(), [ 'jms_serializer' => '?'.SerializerInterface::class, ]);
    }


    protected function serialize($data)
    {
        return $this->container->get('jms_serializer')
            ->serialize($data, 'json');
    }

    protected function deserialize($data, $entity)
    {
        return $this->container->get('jms_serializer')
            ->deserialize($data,$entity, 'json');
    }
}




