<?php


namespace App\Controller;



use FOS\RestBundle\Controller\FOSRestController;
use JMS\Serializer\SerializerInterface;




class BaseController extends FOSRestController
{

    public static function getSubscribedServices() {
        return array_merge(parent::getSubscribedServices(), [ 'jms_serializer' => '?'.SerializerInterface::class, ]);
    }

    /**
     * @param $data
     * @return mixed
     */
    protected function serialize($data)
    {
        return $this->container->get('jms_serializer')
            ->serialize($data, 'json');
    }

    /**
     * @param $object
     * @param $class
     * @return mixed
     */
    protected function deserialize($object, $class)
    {
        return $this->container->get('jms_serializer')
            ->deserialize($object, $class, 'json');
    }
}


