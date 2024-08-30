<?php

/*
 * This file is part of foskym/flarum-user-badges-fix.
 *
 * Copyright (c) 2024 FoskyM.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace FoskyM\UserBadgesFix;

use Flarum\Extend;
use Flarum\Api\Serializer\ForumSerializer;
use Flarum\Api\Controller\ShowForumController;
use Flarum\Api\Controller\ListNotificationsController;
use V17Development\FlarumUserBadges\Api\Serializer\BadgeSerializer;
use V17Development\FlarumUserBadges\Api\Serializer\UserBadgeSerializer;

return [
    (new Extend\ApiSerializer(ForumSerializer::class))
        ->hasMany('badges', BadgeSerializer::class)
        ->hasMany('userBadges', UserBadgeSerializer::class),

    (new Extend\ApiController(ShowForumController::class))
        ->addInclude(['badges', 'userBadges', 'userBadges.badge'])
        ->prepareDataForSerialization(LoadForumBadgesRelationship::class),
];
