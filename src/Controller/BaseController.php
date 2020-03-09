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

<<<<<<< HEAD
    /**
     * @param $object
     * @param $class
     * @return mixed
     */
    protected function deserialize($object, $class)
    {
        return $this->container->get('jms_serializer')
            ->deserialize($object, $class, 'json');
=======
    protected function deserialize($data, $entity)
    {
        return $this->container->get('jms_serializer')
            ->deserialize($data,$entity, 'json');
>>>>>>> 222e5d507b395522b3e51158f2c8b52a95a71ae2
    }
}




