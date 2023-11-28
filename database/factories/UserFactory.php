<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = User::class;
	
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		$email = ['admin@demosite.com','admin@larapen.com', $this->faker->unique()->email];
		$date = date('Ymd');
		$directory = public_path('/images/portrait/small/');
		$files = [];
		$files = File::files($directory);
		$randomFile = $files[rand(0, count($files) - 1)];
		$fileInfo = pathinfo($randomFile);
		//dd($fileInfo);
		$fullPath = storage_path() . '/app/public/users/' . $date . '/';
		if (!file_exists($fullPath)) {
			File::makeDirectory($fullPath, 0777, true);
		}
		File::copy($directory .''. $fileInfo['basename'], $fullPath .''. $fileInfo['basename']);
		//$path = 'users/' . $date . '/';
		//$filename = 'profil_' . md5(time()) . '.' . $fileInfo['extension'];
		$filePath = 'users/' . $date . '/' . $fileInfo['basename'] . '';
		$photoPath = $filePath;
		// Get "/public/images/portrait/small/" folder's files ...
		// Get one file (by random) from the files above ...
		// Create the "/storage/app/public/users/{$date}/" folder (recursively) if doesn't exist
		// Copy the file to "/storage/app/public/users/{$date}/$filename"
		// Get the file above name ... ($filename)
		// Photo Path
		// $photoPath = 'users/' . $date . '/' . $filename;
		return [
			'name'              => $this->faker->userName,
			'photo_path'        => $photoPath,
			'email'             => $this->faker->unique()->randomElement($email),
			'email_verified_at' => now(),
			'phone'             => $this->faker->phoneNumber,
			'mobile_phone'      => $this->faker->tollFreePhoneNumber,
			'password'          => Hash::make('123456'),
			'remember_token'    => Str::random(10),
			'created_at'        => strtotime($date),
		];
	}
}
