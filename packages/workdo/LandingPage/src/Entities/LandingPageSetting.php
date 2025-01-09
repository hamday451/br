<?php

namespace Workdo\LandingPage\Entities;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Utility;
use Illuminate\Support\Facades\Storage;

class LandingPageSetting extends Model
{
    use HasFactory;

    protected $table = 'landing_page_settings';

    protected $fillable = [
        'name',
        'value'
    ];

    protected static function newFactory()
    {
        return \Workdo\LandingPage\Database\factories\LandingPageSettingFactory::new();
    }

    public static function settings()
    {
        $data = LandingPageSetting::get();

        $settings = [
            "topbar_status" => "on",
            "topbar_notification_msg" => "70% Special Offer. Don’t Miss it. The offer ends in 72 hours.",

            "menubar_status" => "on",
            "menubar_page"=>'',
            "site_logo"=>'',
            "site_description"=>'',

            "home_status" => "on",
            "home_offer_text"=>"",
            "home_title"=>"Home",
            "home_heading"=>"",
            "home_description"=>"",
            "home_trusted_by"=>"",
            "home_live_demo_link"=>"",
            "home_buy_now_link"=>"",
            "home_banner"=>"",
            "home_logo"=>"",

            "feature_status" => "on",
            "feature_title"=>"Features",
            "feature_heading"=>"",
            "feature_description"=>"",
            "feature_buy_now_link"=>"",

            "feature_of_features"=>"",

            // "feature_banner_heading"=>"",
            // "feature_banner_description"=>"",
            // "feature_banner"=>"",

            "highlight_feature_heading"=>"",
            "highlight_feature_description"=>"",
            "highlight_feature_image"=>"",

            "other_features"=>"",

            "discover_status" => "on",
            "discover_heading" => "",
            "discover_description" => "",
            "discover_live_demo_link" => "",
            "discover_buy_now_link" => "",

            "discover_of_features" => "",

            "screenshots_status" => "on",
            "screenshots_heading" => "",
            "screenshots_description" => "",

            "screenshots" => "",

            "plan_status" => "on",
            "plan_title" => "Plan",
            "plan_heading" => "",
            "plan_description" => "",

            "faq_status" => "on",
            "faq_title" => "Faq",
            "faq_heading" => "",
            "faq_description" => "",
            "faqs" => "",

            "testimonials_status" => "on",
            "testimonials_heading" => "",
            "testimonials_description" => "",
            "testimonials_long_description" => "",
            "testimonials" => "",

            "footer_status" => "on",

            "joinus_status" => "on",
            "joinus_heading" => "",
            "joinus_description" => "",

            "product_campaign" => "on",
            "product_campaign_title" =>"",
            "product_campaign_heading"=>"",
            "product_campaign_description"=>"",

        ];

        foreach($data as $row)
        {
            $settings[$row->name] = $row->value;
        }

        return $settings;
    }


    public static function upload_file($request,$key_name,$name,$path,$custom_validation =[])
    {
        try{

                $settings = getSuperAdminAllSetting();

            if(!empty($settings['storage_setting'])){
                if($settings['storage_setting'] == 'wasabi'){

                    config(
                        [
                            'filesystems.disks.wasabi.key' => $settings['wasabi_key'],
                            'filesystems.disks.wasabi.secret' => $settings['wasabi_secret'],
                            'filesystems.disks.wasabi.region' => $settings['wasabi_region'],
                            'filesystems.disks.wasabi.bucket' => $settings['wasabi_bucket'],
                            'filesystems.disks.wasabi.endpoint' => 'https://s3.'.$settings['wasabi_region'].'.wasabisys.com'
                        ]
                    );

                    $max_size = !empty($settings['wasabi_max_upload_size'])? $settings['wasabi_max_upload_size']:'2048';
                    $mimes =  !empty($settings['wasabi_storage_validation'])? $settings['wasabi_storage_validation']:'';

                }else if($settings['storage_setting'] == 's3'){
                    config(
                        [
                            'filesystems.disks.s3.key' => $settings['s3_key'],
                            'filesystems.disks.s3.secret' => $settings['s3_secret'],
                            'filesystems.disks.s3.region' => $settings['s3_region'],
                            'filesystems.disks.s3.bucket' => $settings['s3_bucket'],
                            'filesystems.disks.s3.use_path_style_endpoint' => false,
                        ]
                    );
                    $max_size = !empty($settings['s3_max_upload_size'])? $settings['s3_max_upload_size']:'2048';
                    $mimes =  !empty($settings['s3_storage_validation'])? $settings['s3_storage_validation']:'';


                }else{

                    $max_size = !empty($settings['local_storage_max_upload_size'])? $settings['local_storage_max_upload_size']:'20480000000';

                    $mimes =  !empty($settings['local_storage_validation'])? $settings['local_storage_validation']:'';
                }


                $file = $request->$key_name;

                if(count($custom_validation) > 0){

                    $validation =$custom_validation;
                }else{

                    $validation =[
                        'mimes:'.$mimes,
                        'max:'.$max_size,
                    ];

                }

                $validator = \Validator::make($request->all(), [
                    $key_name =>$validation
                ]);

                if($validator->fails()){

                    $res = [
                        'flag' => 0,
                        'msg' => $validator->messages()->first(),
                    ];

                    return $res;
                } else {

                    $name = $name;

                    if($settings['storage_setting']=='local')
                    {
                        if (!\Storage::disk('theme')->exists($path)) { $oldUmask = umask(0);
                            // Temporarily disable permission mask
                           \Storage::disk('theme')->makeDirectory($path, 0777, true); // Recursively create directories with permissions
                           umask($oldUmask); // Restore the original umask
                           // Check if chmod exists
                           if (function_exists('chmod')) {
                                $fullPath = \Storage::disk('theme')->path($path); 
                                @chmod($fullPath, 0777); // Set permissions if possible
                           }
                        }

                        $image = !empty($image) ? $image : $request->file($key_name);
                        \Storage::disk('theme')->putFileAs(
                            $path,
                            $image,
                            $name
                        );
                        $path = $path . $name;
                        // $request->$key_name->move(storage_path($path), $name);
                        // $path = $path.$name;
                    }
                    else if($settings['storage_setting'] == 'wasabi'){

                        $path = \Storage::disk('wasabi')->putFileAs(
                            $path,
                            $file,
                            $name
                        );


                    }else if($settings['storage_setting'] == 's3'){

                        $path = \Storage::disk('s3')->putFileAs(
                            $path,
                            $file,
                            $name
                        );
                    }



                    $res = [
                        'flag' => 1,
                        'msg'  =>'success',
                        'url'  => $path
                    ];
                    return $res;
                }

            }else{
                $res = [
                    'flag' => 0,
                    'msg' => __('Please set proper configuration for storage.'),
                ];
                return $res;
            }

        }catch(\Exception $e){

            $res = [
                'flag' => 0,
                'msg' => $e->getMessage(),
            ];
            return $res;
        }
    }

    public static function keyWiseUpload_file($request, $key_name, $name, $path, $data_key, $custom_validation = [])
	{

		$multifile = [
		    $key_name => $request->file($key_name)[$data_key][$key_name],
		];


		try {
		    $settings = getSuperAdminAllSetting();


		    if (!empty($settings['storage_setting'])) {

		        if ($settings['storage_setting'] == 'wasabi') {

		            config(
		                [
		                    'filesystems.disks.wasabi.key' => $settings['wasabi_key'],
		                    'filesystems.disks.wasabi.secret' => $settings['wasabi_secret'],
		                    'filesystems.disks.wasabi.region' => $settings['wasabi_region'],
		                    'filesystems.disks.wasabi.bucket' => $settings['wasabi_bucket'],
		                    'filesystems.disks.wasabi.endpoint' => 'https://s3.' . $settings['wasabi_region'] . '.wasabisys.com'
		                ]
		            );

		            $max_size = !empty($settings['wasabi_max_upload_size']) ? $settings['wasabi_max_upload_size'] : '2048';
		            $mimes =  !empty($settings['wasabi_storage_validation']) ? $settings['wasabi_storage_validation'] : '';
		        } else if ($settings['storage_setting'] == 's3') {
		            config(
		                [
		                    'filesystems.disks.s3.key' => $settings['s3_key'],
		                    'filesystems.disks.s3.secret' => $settings['s3_secret'],
		                    'filesystems.disks.s3.region' => $settings['s3_region'],
		                    'filesystems.disks.s3.bucket' => $settings['s3_bucket'],
		                    'filesystems.disks.s3.use_path_style_endpoint' => false,
		                ]
		            );
		            $max_size = !empty($settings['s3_max_upload_size']) ? $settings['s3_max_upload_size'] : '2048';
		            $mimes =  !empty($settings['s3_storage_validation']) ? $settings['s3_storage_validation'] : '';
		        } else {
		            $max_size = !empty($settings['local_storage_max_upload_size']) ? $settings['local_storage_max_upload_size'] : '2048';

		            $mimes =  !empty($settings['local_storage_validation']) ? $settings['local_storage_validation'] : '';
		        }


		        $file = $request->$key_name;


		        if (count($custom_validation) > 0) {
		            $validation = $custom_validation;
		        } else {

		            $validation = [
		                'mimes:' . $mimes,
		                'max:' . $max_size,
		            ];
		        }

		        $validator = \Validator::make($multifile, [
		            $key_name => $validation
		        ]);


		        if ($validator->fails()) {
		            $res = [
		                'flag' => 0,
		                'msg' => $validator->messages()->first(),
		            ];
		            return $res;
		        } else {

		            $name = $name;

		            if ($settings['storage_setting'] == 'local') {

                        $path = 'uploads/' . $path . '/';
                        if (!\Storage::disk('theme')->exists($path)) { $oldUmask = umask(0);
                            // Temporarily disable permission mask
                           \Storage::disk('theme')->makeDirectory($path, 0777, true); // Recursively create directories with permissions
                           umask($oldUmask); // Restore the original umask
                           // Check if chmod exists
                           if (function_exists('chmod')) {
                                $fullPath = \Storage::disk('theme')->path($path); 
                                @chmod($fullPath, 0777); // Set permissions if possible
                           }
                        }

                        Storage::disk('theme')->putFileAs(
                            $path,
                            $request->file($key_name)[$data_key][$key_name],
                            $name
                        );

		                $path = $path.$name;
		            } else if ($settings['storage_setting'] == 'wasabi') {

		                $path = \Storage::disk('wasabi')->putFileAs(
		                    $path,
		                    $file,
		                    $name
		                );

		                // $path = $path.$name;

		            } else if ($settings['storage_setting'] == 's3') {

		                $path = \Storage::disk('s3')->putFileAs(
		                    $path,
		                    $file,
		                    $name
		                );
		            }


		            $res = [
		                'flag' => 1,
		                'msg'  => 'success',
		                'url'  => $path
		            ];
		            return $res;
		        }
		    } else {
		        $res = [
		            'flag' => 0,
		            'msg' => __('Please set proper configuration for storage.'),
		        ];
		        return $res;
		    }
		} catch (\Exception $e) {
		    $res = [
		        'flag' => 0,
		        'msg' => $e->getMessage(),
		    ];
		    return $res;
		}
	}
}