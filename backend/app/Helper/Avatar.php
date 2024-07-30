<?php

namespace App\Helper;

class Avatar
{
  const LIST = [
    'storage/image/avatars/astronaut',
    'storage/image/avatars/bear',
    'storage/image/avatars/chicken',
    'storage/image/avatars/dog',
    'storage/image/avatars/fox',
    'storage/image/avatars/meerkat',
    'storage/image/avatars/panda',
    'storage/image/avatars/rabbit'
  ];


  public static function getRandomAvatar()
  {
    return self::LIST[array_rand(self::LIST, 1)];
  }

  public static function getAllAvatars()
  {
    return self::LIST;
  }
}
