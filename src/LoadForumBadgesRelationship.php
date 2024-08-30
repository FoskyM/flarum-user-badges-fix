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

use Flarum\Api\Controller\ShowForumController;
use Flarum\Http\RequestUtil;
use Psr\Http\Message\ServerRequestInterface;
use V17Development\FlarumUserBadges\Badge\Badge;
use V17Development\FlarumUserBadges\UserBadge\UserBadge;

class LoadForumBadgesRelationship
{
    /**
     * @param ShowForumController $controller
     * @param $data
     * @param ServerRequestInterface $request
     */
    public function __invoke(ShowForumController $controller, &$data, ServerRequestInterface $request)
    {
        $actor = RequestUtil::getActor($request);

        $data['badges'] = Badge::all();

        $data['userBadges'] = UserBadge::where('user_id', $actor->id)->get();
    }
}