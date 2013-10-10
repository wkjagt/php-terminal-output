<?php

class SocketFactory
{
    public function create($arg)
    {
        if(is_array($arg)) {
            return new MasterSocket($arg);
        } else {

            if (($msgsock = socket_accept($arg->getRawSocket())) === false) {
                throw new SocketException();
            }

            return new ClientSocket($msgsock);
        }


    }
}