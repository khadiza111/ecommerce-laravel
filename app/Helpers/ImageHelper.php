<?php

namespace App\Helpers;

use App\Models\User;
use App\Helpers\GravatarHelper;

/**
 * ImageHelper class
 */
class ImageHelper 
{
	public static function getUserImage($id)
	{
		$user = User::find($id);
		$avatar_url = "";
		if (!is_null($user)) {
			if ($user->avatar == NULL) {
				// return that in gravatar image
				if (GravatarHelper::validate_gravatar($user->email)) {
					$avatar_url = GravatarHelper::gravatar_image($user->email, 100);
				} else {
					// when there is no gravatar image
					$avatar_url = url('public/images/defaults/user.png');
				}
			} else {
				// return that image
				$avatar_url = url('public/images/users/'. $user->avatar);
			}			
		} else {
			//return redirect('/');
		}
		return $avatar_url;
	}
}