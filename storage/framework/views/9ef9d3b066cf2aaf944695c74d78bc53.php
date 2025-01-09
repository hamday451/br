
<?php if(isset($json_data->section)): ?>
    <?php echo e(Form::open(['route' => ['home.page.setting'], 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

    <input type="hidden" name="section_name" value="<?php echo e($json_data->section_slug); ?>">
    <input type="hidden" name="theme_id" value="<?php echo e($currentTheme); ?>">
    <input type="hidden" name="array[section_name]" value="<?php echo e($json_data->section_name); ?>">
    <input type="hidden" name="array[section_slug]" value="<?php echo e($json_data->section_slug); ?>">
    <input type="hidden" name="array[unique_section_slug]" value="<?php echo e($json_data->unique_section_slug); ?>">
    <input type="hidden" name="array[section_enable]" value="<?php echo e($json_data->section_enable); ?>">
    <input type="hidden" name="array[array_type]" value="<?php echo e($json_data->array_type); ?>">
    <input type="hidden" name="array[loop_number]" value="<?php echo e($json_data->loop_number ?? 1); ?>" id="slider-loop-number">

    <div class="card sidebar-card">
        <div class="card-header d-flex justify-content-between">
            <div>
                <h5> <?php echo e($json_data->section_name); ?> </h5>
            </div>
        </div>
        <div class="card-body slider-body-rows">
            <?php if(isset($json_data->section->background_image)): ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="form-label"><?php echo e($json_data->section->background_image->lable); ?></label>
                        <input type="hidden" name="array[section][background_image][slug]" class="form-control" value="<?php echo e($json_data->section->background_image->slug ?? ''); ?>">
                        <input type="hidden" name="array[section][background_image][lable]" class="form-control" value="<?php echo e($json_data->section->background_image->lable ?? ''); ?>">
                        <input type="hidden" name="array[section][background_image][type]" class="form-control" value="<?php echo e($json_data->section->background_image->type ?? ''); ?>">
                        <input type="hidden" name="array[section][background_image][placeholder]" class="form-control" value="<?php echo e($json_data->section->background_image->placeholder ?? ''); ?>">
                        <input type="hidden" name="array[section][background_image][image]" class="form-control" value="<?php echo e($json_data->section->background_image->image ?? ''); ?>">
                        <input type="file" name="array[section][background_image][text]" class="form-control" value="<?php echo e($json_data->section->background_image->text ?? ''); ?>"
                                placeholder="<?php echo e($json_data->section->background_image->placeholder); ?>" id="<?php echo e($json_data->section->background_image->slug); ?>" accept="*">

                        <img src="<?php echo e(asset($json_data->section->background_image->image)); ?>" style="width:80%; height: 200px;object-fit: cover;margin-top: 10px;" class="<?php echo e($json_data->section->background_image->slug.'_preview'); ?>" accept="image/*">

                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if(isset($json_data->section->background_image_second)): ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="form-label"><?php echo e($json_data->section->background_image_second->lable); ?></label>
                        <input type="hidden" name="array[section][background_image_second][slug]" class="form-control" value="<?php echo e($json_data->section->background_image_second->slug ?? ''); ?>">
                        <input type="hidden" name="array[section][background_image][lable]" class="form-control" value="<?php echo e($json_data->section->background_image_second->lable ?? ''); ?>">
                        <input type="hidden" name="array[section][background_image_second][type]" class="form-control" value="<?php echo e($json_data->section->background_image_second->type ?? ''); ?>">
                        <input type="hidden" name="array[section][background_image_second][placeholder]" class="form-control" value="<?php echo e($json_data->section->background_image_second->placeholder ?? ''); ?>">
                        <input type="hidden" name="array[section][background_image_second][image]" class="form-control" value="<?php echo e($json_data->section->background_image_second->image ?? ''); ?>">
                        <input type="file" name="array[section][background_image_second][text]" class="form-control" value="<?php echo e($json_data->section->background_image_second->text ?? ''); ?>"
                                placeholder="<?php echo e($json_data->section->background_image_second->placeholder); ?>" id="<?php echo e($json_data->section->background_image_second->slug); ?>">

                        <img src="<?php echo e(asset($json_data->section->background_image_second->image)); ?>" style="width:80%; height: 200px;object-fit: cover;margin-top: 10px;" class="<?php echo e($json_data->section->background_image_second->slug.'_preview'); ?>" accept="image/*">

                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if(isset($json_data->section->service_title)): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label
                                class="form-label"><?php echo e($json_data->section->service_title->lable); ?></label>
                            <input type="hidden" name="array[section][service_title][slug]"
                                class="form-control"
                                value="<?php echo e($json_data->section->service_title->slug ?? ''); ?>">
                            <input type="hidden" name="array[section][service_title][lable]"
                                class="form-control"
                                value="<?php echo e($json_data->section->service_title->lable ?? ''); ?>">
                            <input type="hidden" name="array[section][service_title][type]"
                                class="form-control"
                                value="<?php echo e($json_data->section->service_title->type ?? ''); ?>">
                            <input type="hidden" name="array[section][service_title][placeholder]"
                                class="form-control"
                                value="<?php echo e($json_data->section->service_title->placeholder ?? ''); ?>">
                            <input type="hidden" name="array[section][service_title][image]"
                                class="form-control"
                                value="<?php echo e($json_data->section->service_title->image ?? ''); ?>">
                            <input type="text" name="array[section][service_title][text]"
                                class="form-control"
                                value="<?php echo e($json_data->section->service_title->text ?? ''); ?>"
                                placeholder="<?php echo e($json_data->section->service_title->placeholder); ?>"
                                id="<?php echo e($json_data->section->service_title->slug); ?>">
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if(isset($json_data->section->service_sub_title)): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label
                                class="form-label"><?php echo e($json_data->section->service_sub_title->lable); ?></label>
                            <input type="hidden" name="array[section][service_sub_title][slug]"
                                class="form-control"
                                value="<?php echo e($json_data->section->service_sub_title->slug ?? ''); ?>">
                            <input type="hidden" name="array[section][service_sub_title][lable]"
                                class="form-control"
                                value="<?php echo e($json_data->section->service_sub_title->lable ?? ''); ?>">
                            <input type="hidden" name="array[section][service_sub_title][type]"
                                class="form-control"
                                value="<?php echo e($json_data->section->service_sub_title->type ?? ''); ?>">
                            <input type="hidden" name="array[section][service_sub_title][placeholder]"
                                class="form-control"
                                value="<?php echo e($json_data->section->service_sub_title->placeholder ?? ''); ?>">
                            <input type="hidden" name="array[section][service_sub_title][image]"
                                class="form-control"
                                value="<?php echo e($json_data->section->service_sub_title->image ?? ''); ?>">
                            <input type="text" name="array[section][service_sub_title][text]"
                                class="form-control"
                                value="<?php echo e($json_data->section->service_sub_title->text ?? ''); ?>"
                                placeholder="<?php echo e($json_data->section->service_sub_title->placeholder); ?>"
                                id="<?php echo e($json_data->section->service_sub_title->slug); ?>">
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if(isset($json_data->section->service_button)): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label
                                class="form-label"><?php echo e($json_data->section->service_button->lable); ?></label>
                            <input type="hidden" name="array[section][service_button][slug]"
                                class="form-control"
                                value="<?php echo e($json_data->section->service_button->slug ?? ''); ?>">
                            <input type="hidden" name="array[section][service_button][lable]"
                                class="form-control"
                                value="<?php echo e($json_data->section->service_button->lable ?? ''); ?>">
                            <input type="hidden" name="array[section][service_button][type]"
                                class="form-control"
                                value="<?php echo e($json_data->section->service_button->type ?? ''); ?>">
                            <input type="hidden" name="array[section][service_button][placeholder]"
                                class="form-control"
                                value="<?php echo e($json_data->section->service_button->placeholder ?? ''); ?>">
                            <input type="hidden" name="array[section][service_button][image]"
                                class="form-control"
                                value="<?php echo e($json_data->section->service_button->image ?? ''); ?>">
                            <input type="text" name="array[section][service_button][text]"
                                class="form-control"
                                value="<?php echo e($json_data->section->service_button->text ?? ''); ?>"
                                placeholder="<?php echo e($json_data->section->service_button->placeholder); ?>"
                                id="<?php echo e($json_data->section->service_button->slug); ?>">
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if(isset($json_data->section->service_description)): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label
                                class="form-label"><?php echo e($json_data->section->service_description->lable); ?></label>
                            <input type="hidden" name="array[section][service_description][slug]"
                                class="form-control"
                                value="<?php echo e($json_data->section->service_description->slug ?? ''); ?>">
                            <input type="hidden" name="array[section][service_description][lable]"
                                class="form-control"
                                value="<?php echo e($json_data->section->service_description->lable ?? ''); ?>">
                            <input type="hidden" name="array[section][service_description][type]"
                                class="form-control"
                                value="<?php echo e($json_data->section->service_description->type ?? ''); ?>">
                            <input type="hidden" name="array[section][service_description][placeholder]"
                                class="form-control"
                                value="<?php echo e($json_data->section->service_description->placeholder ?? ''); ?>">
                            <input type="hidden" name="array[section][service_description][image]"
                                class="form-control"
                                value="<?php echo e($json_data->section->service_description->image ?? ''); ?>">
                            <textarea name="array[section][service_description][text]"
                                class="form-control"
                                placeholder="<?php echo e($json_data->section->service_description->placeholder); ?>"
                                id="<?php echo e($json_data->section->service_description->slug); ?>"> <?php echo e($json_data->section->service_description->text ?? ''); ?> </textarea>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if(isset($json_data->section->service_image)): ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="form-label"><?php echo e($json_data->section->service_image->lable); ?></label>
                        <input type="hidden" name="array[section][service_image][slug]" class="form-control" value="<?php echo e($json_data->section->service_image->slug ?? ''); ?>">
                        <input type="hidden" name="array[section][background_image][lable]" class="form-control" value="<?php echo e($json_data->section->service_image->lable ?? ''); ?>">
                        <input type="hidden" name="array[section][service_image][type]" class="form-control" value="<?php echo e($json_data->section->service_image->type ?? ''); ?>">
                        <input type="hidden" name="array[section][service_image][placeholder]" class="form-control" value="<?php echo e($json_data->section->service_image->placeholder ?? ''); ?>">
                        <input type="hidden" name="array[section][service_image][image]" class="form-control" value="<?php echo e($json_data->section->service_image->image ?? ''); ?>">
                        <input type="file" name="array[section][service_image][text]" class="form-control" value="<?php echo e($json_data->section->service_image->text ?? ''); ?>"
                                placeholder="<?php echo e($json_data->section->service_image->placeholder); ?>" id="<?php echo e($json_data->section->service_image->slug); ?>">

                        <img src="<?php echo e(asset($json_data->section->service_image->image)); ?>" style="width:80%; height: 200px;object-fit: cover;margin-top: 10px;" class="<?php echo e($json_data->section->service_image->slug.'_preview'); ?>" accept="image/*">

                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if(isset($json_data->section->service_second_title)): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label
                                class="form-label"><?php echo e($json_data->section->service_second_title->lable); ?></label>
                            <input type="hidden" name="array[section][service_second_title][slug]"
                                class="form-control"
                                value="<?php echo e($json_data->section->service_second_title->slug ?? ''); ?>">
                            <input type="hidden" name="array[section][service_second_title][lable]"
                                class="form-control"
                                value="<?php echo e($json_data->section->service_second_title->lable ?? ''); ?>">
                            <input type="hidden" name="array[section][service_second_title][type]"
                                class="form-control"
                                value="<?php echo e($json_data->section->service_second_title->type ?? ''); ?>">
                            <input type="hidden" name="array[section][service_second_title][placeholder]"
                                class="form-control"
                                value="<?php echo e($json_data->section->service_second_title->placeholder ?? ''); ?>">
                            <input type="hidden" name="array[section][service_second_title][image]"
                                class="form-control"
                                value="<?php echo e($json_data->section->service_second_title->image ?? ''); ?>">
                            <input type="text" name="array[section][service_second_title][text]"
                                class="form-control"
                                value="<?php echo e($json_data->section->service_second_title->text ?? ''); ?>"
                                placeholder="<?php echo e($json_data->section->service_second_title->placeholder); ?>"
                                id="<?php echo e($json_data->section->service_second_title->slug); ?>">
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(isset($json_data->section->service_second_description)): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label
                                class="form-label"><?php echo e($json_data->section->service_second_description->lable); ?></label>
                            <input type="hidden" name="array[section][service_second_description][slug]"
                                class="form-control"
                                value="<?php echo e($json_data->section->service_second_description->slug ?? ''); ?>">
                            <input type="hidden" name="array[section][service_second_description][lable]"
                                class="form-control"
                                value="<?php echo e($json_data->section->service_second_description->lable ?? ''); ?>">
                            <input type="hidden" name="array[section][service_second_description][type]"
                                class="form-control"
                                value="<?php echo e($json_data->section->service_second_description->type ?? ''); ?>">
                            <input type="hidden" name="array[section][service_second_description][placeholder]"
                                class="form-control"
                                value="<?php echo e($json_data->section->service_second_description->placeholder ?? ''); ?>">
                            <input type="hidden" name="array[section][service_second_description][image]"
                                class="form-control"
                                value="<?php echo e($json_data->section->service_second_description->image ?? ''); ?>">
                            <textarea name="array[section][service_second_description][text]"
                                class="form-control"
                                placeholder="<?php echo e($json_data->section->service_second_description->placeholder); ?>"
                                id="<?php echo e($json_data->section->service_second_description->slug); ?>"> <?php echo e($json_data->section->service_second_description->text ?? ''); ?> </textarea>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(isset($json_data->section->service_second_image)): ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="form-label"><?php echo e($json_data->section->service_second_image->lable); ?></label>
                        <input type="hidden" name="array[section][service_second_image][slug]" class="form-control" value="<?php echo e($json_data->section->service_second_image->slug ?? ''); ?>">
                        <input type="hidden" name="array[section][background_image][lable]" class="form-control" value="<?php echo e($json_data->section->service_second_image->lable ?? ''); ?>">
                        <input type="hidden" name="array[section][service_second_image][type]" class="form-control" value="<?php echo e($json_data->section->service_second_image->type ?? ''); ?>">
                        <input type="hidden" name="array[section][service_second_image][placeholder]" class="form-control" value="<?php echo e($json_data->section->service_second_image->placeholder ?? ''); ?>">
                        <input type="hidden" name="array[section][service_second_image][image]" class="form-control" value="<?php echo e($json_data->section->service_second_image->image ?? ''); ?>">
                        <input type="file" name="array[section][service_second_image][text]" class="form-control" value="<?php echo e($json_data->section->service_second_image->text ?? ''); ?>"
                                placeholder="<?php echo e($json_data->section->service_second_image->placeholder); ?>" id="<?php echo e($json_data->section->service_second_image->slug); ?>">

                        <img src="<?php echo e(asset($json_data->section->service_second_image->image)); ?>" style="width:80%; height: 200px;object-fit: cover;margin-top: 10px;" class="<?php echo e($json_data->section->service_second_image->slug.'_preview'); ?>" accept="image/*">

                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if(isset($json_data->section->video_title)): ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="form-label"><?php echo e($json_data->section->video_title->lable); ?></label>
                        <input type="hidden" name="array[section][video_title][slug]" class="form-control" value="<?php echo e($json_data->section->video_title->slug ?? ''); ?>">
                        <input type="hidden" name="array[section][video_title][lable]" class="form-control" value="<?php echo e($json_data->section->video_title->lable ?? ''); ?>">
                        <input type="hidden" name="array[section][video_title][type]" class="form-control" value="<?php echo e($json_data->section->video_title->type ?? ''); ?>">
                        <input type="hidden" name="array[section][video_title][text]" class="form-control" value="<?php echo e($json_data->section->video_title->text ?? ''); ?>">
                        <input type="hidden" name="array[section][video_title][loop_number]" class="form-control" value="<?php echo e($json_data->section->video_title->loop_number ?? ''); ?>">
                        <hr/>
                        <?php if(isset($json_data->section->video_title->type) && ($json_data->section->video_title->type == 'array') && isset($json_data->section->video_title->loop_number)): ?>
                        <?php for($i=0; $i<$json_data->section->video_title->loop_number; $i++): ?>
                            <input type="text" name="array[section][video_title][annouce_text][<?php echo e($i); ?>][text]"
                            class="form-control"
                            value="<?php echo e($json_data->section->video_title->annouce_text->{$i}->text ?? ''); ?>"
                            placeholder="<?php echo e($json_data->section->video_title->placeholder); ?>"
                            id="<?php echo e($json_data->section->video_title->slug.'_'.$i); ?>">
                            <?php endfor; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php if(isset($json_data->section->video)): ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="form-label"><?php echo e($json_data->section->video->lable); ?></label>
                        <input type="hidden" name="array[section][video][slug]" class="form-control" value="<?php echo e($json_data->section->video->slug ?? ''); ?>">
                        <input type="hidden" name="array[section][video][lable]" class="form-control" value="<?php echo e($json_data->section->video->lable ?? ''); ?>">
                        <input type="hidden" name="array[section][video][placeholder]" class="form-control" value="<?php echo e($json_data->section->video->placeholder ?? ''); ?>">

                        <!-- Option to select file or link -->
                        <div class="form-group">
                            <label for="video_type"><?php echo e(__('Select Video Type')); ?></label>
                            <select id="video_type" name="array[section][video][type]" class="form-control" onchange="toggleVideoType()">
                                <option value="file" <?php echo e($json_data->section->video->type == 'file' ? 'selected' : ''); ?>><?php echo e(__('Upload File')); ?></option>
                                <option value="text" <?php echo e($json_data->section->video->type == 'text' ? 'selected' : ''); ?>><?php echo e(__('Provide Link')); ?></option>
                            </select>
                        </div>

                        <input type="hidden" name="array[section][video][image]" class="form-control" value="<?php echo e($json_data->section->video->image ?? ''); ?>">

                        <!-- File Upload Field -->
                        <div id="file_upload_section" style="display: <?php echo e($json_data->section->video->type == 'file' ? 'block' : 'none'); ?>">
                            <input type="file" name="array[section][video][text]" class="form-control" placeholder="<?php echo e($json_data->section->video->placeholder); ?>" accept="video/*">
                            <?php if($json_data->section->video->image): ?>
                                <video src="<?php echo e(asset($json_data->section->video->image)); ?>" controls loop autoplay muted></video>
                            <?php endif; ?>
                        </div>

                        <!-- Video Link Input Field -->
                        <div id="link_upload_section" style="display: <?php echo e($json_data->section->video->type == 'text' ? 'block' : 'none'); ?>">
                            <input type="url" name="array[section][video][text]" class="form-control" placeholder="<?php echo e(__('Please provide the video link')); ?>" value="<?php echo e($json_data->section->video->text ?? ''); ?>">
                            <?php if($json_data->section->video->text): ?>
                                <video src="<?php echo e($json_data->section->video->text); ?>" controls loop autoplay muted></video>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if(isset($json_data->section->slider_sub_description)): ?>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label
                            class="form-label"><?php echo e($json_data->section->slider_sub_description->lable); ?></label>
                        <input type="hidden"
                            name="array[section][slider_sub_description][slug]"
                            class="form-control"
                            value="<?php echo e($json_data->section->slider_sub_description->slug ?? ''); ?>">
                        <input type="hidden"
                            name="array[section][slider_sub_description][lable]"
                            class="form-control"
                            value="<?php echo e($json_data->section->slider_sub_description->lable ?? ''); ?>">
                        <input type="hidden"
                            name="array[section][slider_sub_description][type]"
                            class="form-control"
                            value="<?php echo e($json_data->section->slider_sub_description->type ?? ''); ?>">
                        <input type="hidden"
                            name="array[section][slider_sub_description][placeholder]"
                            class="form-control"
                            value="<?php echo e($json_data->section->slider_sub_description->placeholder ?? ''); ?>">
                        <textarea type="text" name="array[section][slider_sub_description][text]" class="form-control"
                            placeholder="<?php echo e($json_data->section->slider_sub_description->placeholder); ?>"
                            id="<?php echo e($json_data->section->slider_sub_description->slug); ?>"> <?php echo e($json_data->section->slider_sub_description->text ?? ''); ?> </textarea>

                    </div>
                </div>
            <?php endif; ?>
            <?php for($i=0; $i< $json_data->loop_number; $i++): ?>
            <div class="row slider_<?php echo e($i); ?>" data-slider-index="<?php echo e($i); ?>">
                <?php if($json_data->array_type == 'multi-inner-list'): ?>
                    <?php if($json_data->section_name == 'Homepage Slider'): ?>
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne<?php echo e($i); ?>">
                                    <button class="accordion-button collapsed slider-collspan" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo e($json_data->section_slug . '_'. $i); ?>" aria-expanded="false" aria-controls="<?php echo e($json_data->section_slug . '_'. $i); ?>">
                                        <?php echo e($json_data->section_name); ?>

                                    </button>
                                </h2>
                                <div id="<?php echo e($json_data->section_slug . '_'.$i); ?>" class="accordion-collapse collapse slider-collspan-body" aria-labelledby="flush-headingOne<?php echo e($i); ?>" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">

                                        <?php if(isset($json_data->section->title)): ?>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo e($json_data->section->title->lable); ?></label>
                                                <input type="hidden" name="array[section][title][slug]" class="form-control" value="<?php echo e($json_data->section->title->slug ?? ''); ?>">
                                                <input type="hidden" name="array[section][title][lable]" class="form-control" value="<?php echo e($json_data->section->title->lable ?? ''); ?>">
                                                <input type="hidden" name="array[section][title][type]" class="form-control" value="<?php echo e($json_data->section->title->type ?? ''); ?>">
                                                <input type="hidden" name="array[section][title][placeholder]" class="form-control" value="<?php echo e($json_data->section->title->placeholder ?? ''); ?>">
                                                <input type="text" name="array[section][title][text][<?php echo e($i); ?>]" class="form-control" value="<?php echo e($json_data->section->title->text->{$i} ?? ''); ?>"
                                                        placeholder="<?php echo e($json_data->section->title->placeholder); ?>" id="<?php echo e($json_data->section->title->slug.'_'.$i); ?>">

                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <?php if(isset($json_data->section->sub_title)): ?>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo e($json_data->section->sub_title->lable); ?></label>
                                                <input type="hidden" name="array[section][sub_title][slug]" class="form-control" value="<?php echo e($json_data->section->sub_title->slug ?? ''); ?>">
                                                <input type="hidden" name="array[section][sub_title][lable]" class="form-control" value="<?php echo e($json_data->section->sub_title->lable ?? ''); ?>">
                                                <input type="hidden" name="array[section][sub_title][type]" class="form-control" value="<?php echo e($json_data->section->sub_title->type ?? ''); ?>">
                                                <input type="hidden" name="array[section][sub_title][placeholder]" class="form-control" value="<?php echo e($json_data->section->sub_title->placeholder ?? ''); ?>">
                                                <input type="text" name="array[section][sub_title][text][<?php echo e($i); ?>]" class="form-control" value="<?php echo e($json_data->section->sub_title->text->{$i} ?? ''); ?>"
                                                        placeholder="<?php echo e($json_data->section->sub_title->placeholder); ?>" id="<?php echo e($json_data->section->sub_title->slug.'_'.$i); ?>">

                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <?php if(isset($json_data->section->button_first)): ?>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo e($json_data->section->button_first->lable); ?></label>
                                                <input type="hidden" name="array[section][button_first][slug]" class="form-control" value="<?php echo e($json_data->section->button_first->slug ?? ''); ?>">
                                                <input type="hidden" name="array[section][button_first][lable]" class="form-control" value="<?php echo e($json_data->section->button_first->lable ?? ''); ?>">
                                                <input type="hidden" name="array[section][button_first][type]" class="form-control" value="<?php echo e($json_data->section->button_first->type ?? ''); ?>">
                                                <input type="hidden" name="array[section][button_first][placeholder]" class="form-control" value="<?php echo e($json_data->section->button_first->placeholder ?? ''); ?>">
                                                <input type="text" name="array[section][button_first][text][<?php echo e($i); ?>]" class="form-control" value="<?php echo e($json_data->section->button_first->text->{$i} ?? ''); ?>"
                                                        placeholder="<?php echo e($json_data->section->button_first->placeholder); ?>" id="<?php echo e($json_data->section->button_first->slug.'_'.$i); ?>">

                                            </div>
                                        </div>
                                        <?php endif; ?>

                                        <?php if(isset($json_data->section->button)): ?>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo e($json_data->section->button->lable); ?></label>
                                                <input type="hidden" name="array[section][button][slug]" class="form-control" value="<?php echo e($json_data->section->button->slug ?? ''); ?>">
                                                <input type="hidden" name="array[section][button][lable]" class="form-control" value="<?php echo e($json_data->section->button->lable ?? ''); ?>">
                                                <input type="hidden" name="array[section][button][type]" class="form-control" value="<?php echo e($json_data->section->button->type ?? ''); ?>">
                                                <input type="hidden" name="array[section][button][placeholder]" class="form-control" value="<?php echo e($json_data->section->button->placeholder ?? ''); ?>">
                                                <input type="text" name="array[section][button][text][<?php echo e($i); ?>]" class="form-control" value="<?php echo e($json_data->section->button->text->{$i} ?? ''); ?>"
                                                        placeholder="<?php echo e($json_data->section->button->placeholder); ?>" id="<?php echo e($json_data->section->button->slug.'_'.$i); ?>">

                                            </div>
                                        </div>
                                        <?php endif; ?>

                                        <?php if(isset($json_data->section->button_second)): ?>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo e($json_data->section->button_second->lable); ?></label>
                                                <input type="hidden" name="array[section][button_second][slug]" class="form-control" value="<?php echo e($json_data->section->button_second->slug ?? ''); ?>">
                                                <input type="hidden" name="array[section][button_second][lable]" class="form-control" value="<?php echo e($json_data->section->button_second->lable ?? ''); ?>">
                                                <input type="hidden" name="array[section][button_second][type]" class="form-control" value="<?php echo e($json_data->section->button_second->type ?? ''); ?>">
                                                <input type="hidden" name="array[section][button_second][placeholder]" class="form-control" value="<?php echo e($json_data->section->button_second->placeholder ?? ''); ?>">
                                                <input type="text" name="array[section][button_second][text][<?php echo e($i); ?>]" class="form-control" value="<?php echo e($json_data->section->button_second->text->{$i} ?? ''); ?>"
                                                        placeholder="<?php echo e($json_data->section->button_second->placeholder); ?>" id="<?php echo e($json_data->section->button_second->slug.'_'.$i); ?>">

                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <?php if(isset($json_data->section->description)): ?>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo e($json_data->section->description->lable); ?></label>
                                                <input type="hidden" name="array[section][description][slug]" class="form-control" value="<?php echo e($json_data->section->description->slug ?? ''); ?>">
                                                <input type="hidden" name="array[section][description][lable]" class="form-control" value="<?php echo e($json_data->section->description->lable ?? ''); ?>">
                                                <input type="hidden" name="array[section][description][type]" class="form-control" value="<?php echo e($json_data->section->description->type ?? ''); ?>">
                                                <input type="hidden" name="array[section][description][placeholder]" class="form-control" value="<?php echo e($json_data->section->description->placeholder ?? ''); ?>">
                                                <textarea type="text" name="array[section][description][text][<?php echo e($i); ?>]" class="form-control"
                                                        placeholder="<?php echo e($json_data->section->description->placeholder); ?>" id="<?php echo e($json_data->section->description->slug.'_'.$i); ?>"> <?php echo e($json_data->section->description->text->{$i} ?? ''); ?> </textarea>

                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <?php if(isset($json_data->section->image)): ?>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo e($json_data->section->image->lable); ?></label>
                                                <input type="hidden" name="array[section][image][slug]" class="form-control" value="<?php echo e($json_data->section->image->slug ?? ''); ?>">
                                                <input type="hidden" name="array[section][image][lable]" class="form-control" value="<?php echo e($json_data->section->image->lable ?? ''); ?>">
                                                <input type="hidden" name="array[section][image][type]" class="form-control" value="<?php echo e($json_data->section->image->type ?? ''); ?>">
                                                <input type="hidden" name="array[section][image][placeholder]" class="form-control" value="<?php echo e($json_data->section->image->placeholder ?? ''); ?>">
                                                <input type="hidden" name="array[section][image][image][<?php echo e($i); ?>]" class="form-control"
                                                value="<?php echo e($json_data->section->image->image->{$i} ?? ''); ?>" >
                                                <input type="file" name="array[section][image][text][<?php echo e($i); ?>]" class="form-control"
                                                        placeholder="<?php echo e($json_data->section->image->placeholder); ?>" >
                                                 <img src="<?php echo e(asset($json_data->section->image->image->{$i} ?? '')); ?>" id="<?php echo e($json_data->section->image->slug.'_'.$i); ?>" accept="image/*">

                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <?php if(isset($json_data->section->title)): ?>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e($json_data->section->title->lable); ?></label>
                                    <input type="hidden" name="array[section][title][slug]" class="form-control" value="<?php echo e($json_data->section->title->slug ?? ''); ?>">
                                    <input type="hidden" name="array[section][title][lable]" class="form-control" value="<?php echo e($json_data->section->title->lable ?? ''); ?>">
                                    <input type="hidden" name="array[section][title][type]" class="form-control" value="<?php echo e($json_data->section->title->type ?? ''); ?>">
                                    <input type="hidden" name="array[section][title][placeholder]" class="form-control" value="<?php echo e($json_data->section->title->placeholder ?? ''); ?>">
                                    <input type="text" name="array[section][title][text][<?php echo e($i); ?>]" class="form-control" value="<?php echo e($json_data->section->title->text->{$i} ?? ''); ?>"
                                            placeholder="<?php echo e($json_data->section->title->placeholder); ?>" id="<?php echo e($json_data->section->title->slug.'_'.$i); ?>">

                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if(isset($json_data->section->sub_title)): ?>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label"><?php echo e($json_data->section->sub_title->lable); ?></label>
                                <input type="hidden" name="array[section][sub_title][slug]" class="form-control" value="<?php echo e($json_data->section->sub_title->slug ?? ''); ?>">
                                <input type="hidden" name="array[section][sub_title][lable]" class="form-control" value="<?php echo e($json_data->section->sub_title->lable ?? ''); ?>">
                                <input type="hidden" name="array[section][sub_title][type]" class="form-control" value="<?php echo e($json_data->section->sub_title->type ?? ''); ?>">
                                <input type="hidden" name="array[section][sub_title][placeholder]" class="form-control" value="<?php echo e($json_data->section->sub_title->placeholder ?? ''); ?>">
                                <input type="text" name="array[section][sub_title][text][<?php echo e($i); ?>]" class="form-control" value="<?php echo e($json_data->section->sub_title->text->{$i} ?? ''); ?>"
                                        placeholder="<?php echo e($json_data->section->sub_title->placeholder); ?>" id="<?php echo e($json_data->section->sub_title->slug.'_'.$i); ?>">

                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if(isset($json_data->section->button)): ?>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label"><?php echo e($json_data->section->button->lable); ?></label>
                                <input type="hidden" name="array[section][button][slug]" class="form-control" value="<?php echo e($json_data->section->button->slug ?? ''); ?>">
                                <input type="hidden" name="array[section][button][lable]" class="form-control" value="<?php echo e($json_data->section->button->lable ?? ''); ?>">
                                <input type="hidden" name="array[section][button][type]" class="form-control" value="<?php echo e($json_data->section->button->type ?? ''); ?>">
                                <input type="hidden" name="array[section][button][placeholder]" class="form-control" value="<?php echo e($json_data->section->button->placeholder ?? ''); ?>">
                                <input type="text" name="array[section][button][text][<?php echo e($i); ?>]" class="form-control" value="<?php echo e($json_data->section->button->text->{$i} ?? ''); ?>"
                                        placeholder="<?php echo e($json_data->section->button->placeholder); ?>" id="<?php echo e($json_data->section->button->slug.'_'.$i); ?>">

                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if(isset($json_data->section->button_first)): ?>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label"><?php echo e($json_data->section->button_first->lable); ?></label>
                                <input type="hidden" name="array[section][button_first][slug]" class="form-control" value="<?php echo e($json_data->section->button_first->slug ?? ''); ?>">
                                <input type="hidden" name="array[section][button_first][lable]" class="form-control" value="<?php echo e($json_data->section->button_first->lable ?? ''); ?>">
                                <input type="hidden" name="array[section][button_first][type]" class="form-control" value="<?php echo e($json_data->section->button_first->type ?? ''); ?>">
                                <input type="hidden" name="array[section][button_first][placeholder]" class="form-control" value="<?php echo e($json_data->section->button_first->placeholder ?? ''); ?>">
                                <input type="text" name="array[section][button_first][text][<?php echo e($i); ?>]" class="form-control" value="<?php echo e($json_data->section->button_first->text->{$i} ?? ''); ?>"
                                        placeholder="<?php echo e($json_data->section->button_first->placeholder); ?>" id="<?php echo e($json_data->section->button_first->slug.'_'.$i); ?>">

                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if(isset($json_data->section->button_second)): ?>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label"><?php echo e($json_data->section->button_second->lable); ?></label>
                                <input type="hidden" name="array[section][button_second][slug]" class="form-control" value="<?php echo e($json_data->section->button_second->slug ?? ''); ?>">
                                <input type="hidden" name="array[section][button_second][lable]" class="form-control" value="<?php echo e($json_data->section->button_second->lable ?? ''); ?>">
                                <input type="hidden" name="array[section][button_second][type]" class="form-control" value="<?php echo e($json_data->section->button_second->type ?? ''); ?>">
                                <input type="hidden" name="array[section][button_second][placeholder]" class="form-control" value="<?php echo e($json_data->section->button_second->placeholder ?? ''); ?>">
                                <input type="text" name="array[section][button_second][text][<?php echo e($i); ?>]" class="form-control" value="<?php echo e($json_data->section->button_second->text->{$i} ?? ''); ?>"
                                        placeholder="<?php echo e($json_data->section->button_second->placeholder); ?>" id="<?php echo e($json_data->section->button_second->slug.'_'.$i); ?>">

                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if(isset($json_data->section->description)): ?>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label"><?php echo e($json_data->section->description->lable); ?></label>
                                <input type="hidden" name="array[section][description][slug]" class="form-control" value="<?php echo e($json_data->section->description->slug ?? ''); ?>">
                                <input type="hidden" name="array[section][description][lable]" class="form-control" value="<?php echo e($json_data->section->description->lable ?? ''); ?>">
                                <input type="hidden" name="array[section][description][type]" class="form-control" value="<?php echo e($json_data->section->description->type ?? ''); ?>">
                                <input type="hidden" name="array[section][description][placeholder]" class="form-control" value="<?php echo e($json_data->section->description->placeholder ?? ''); ?>">
                                <textarea type="text" name="array[section][description][text][<?php echo e($i); ?>]" class="form-control"
                                        placeholder="<?php echo e($json_data->section->description->placeholder); ?>" id="<?php echo e($json_data->section->description->slug.'_'.$i); ?>"> <?php echo e($json_data->section->description->text->{$i} ?? ''); ?> </textarea>

                            </div>
                        </div>
                        <?php endif; ?>
                        <hr/>
                        <?php if(isset($json_data->section->image)): ?>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label"><?php echo e($json_data->section->image->lable); ?></label>
                                <input type="hidden" name="array[section][image][slug]" class="form-control" value="<?php echo e($json_data->section->image->slug ?? ''); ?>">
                                <input type="hidden" name="array[section][image][lable]" class="form-control" value="<?php echo e($json_data->section->image->lable ?? ''); ?>">
                                <input type="hidden" name="array[section][image][type]" class="form-control" value="<?php echo e($json_data->section->image->type ?? ''); ?>">
                                <input type="hidden" name="array[section][image][placeholder]" class="form-control" value="<?php echo e($json_data->section->image->placeholder ?? ''); ?>">
                                <input type="hidden" name="array[section][image][image][<?php echo e($i); ?>]" class="form-control"
                                value="<?php echo e($json_data->section->image->image->{$i} ?? ''); ?>" >
                                <input type="file" name="array[section][image][text][<?php echo e($i); ?>]" class="form-control"
                                        placeholder="<?php echo e($json_data->section->image->placeholder); ?>" accept="*">
                                    <img src="<?php echo e(asset($json_data->section->image->image->{$i} ?? '')); ?>" id="<?php echo e($json_data->section->image->slug.'_'.$i); ?>" accept="image/*">

                            </div>
                        </div>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php else: ?>
                    <?php if(isset($json_data->section->title)): ?>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="form-label"><?php echo e($json_data->section->title->lable); ?></label>
                            <input type="hidden" name="array[section][title][slug]" class="form-control" value="<?php echo e($json_data->section->title->slug ?? ''); ?>">
                            <input type="hidden" name="array[section][title][lable]" class="form-control" value="<?php echo e($json_data->section->title->lable ?? ''); ?>">
                            <input type="hidden" name="array[section][title][type]" class="form-control" value="<?php echo e($json_data->section->title->type ?? ''); ?>">
                            <input type="hidden" name="array[section][title][placeholder]" class="form-control" value="<?php echo e($json_data->section->title->placeholder ?? ''); ?>">
                            <?php if(isset($json_data->section->title->text) && (is_array($json_data->section->title->text) || is_object($json_data->section->title->text)) && isset($json_data->section->title->loop_number)): ?>
                                <hr/>
                                <?php for($i=0; $i<$json_data->section->title->loop_number; $i++): ?>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label"><?php echo e($json_data->section->title->lable .' '. ($i+1)); ?></label>
                                            <input type="text" name="array[section][title][text][<?php echo e($i); ?>]" class="form-control" id="<?php echo e(($json_data->section->title->lable ?? '').'_'.$i); ?>" value="<?php echo e($json_data->section->title->text->{$i} ?? ''); ?>">
                                        </div>
                                    </div>
                                </div>
                                <?php endfor; ?>
                            <?php else: ?>
                            <input type="text" name="array[section][title][text]" class="form-control" value="<?php echo e($json_data->section->title->text ?? ''); ?>"
                                    placeholder="<?php echo e($json_data->section->title->placeholder); ?>" id="<?php echo e($json_data->section->title->slug); ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if(isset($json_data->section->support_title)): ?>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="form-label"><?php echo e($json_data->section->support_title->lable); ?></label>
                            <input type="hidden" name="array[section][support_title][slug]" class="form-control" value="<?php echo e($json_data->section->support_title->slug ?? ''); ?>">
                            <input type="hidden" name="array[section][support_title][lable]" class="form-control" value="<?php echo e($json_data->section->support_title->lable ?? ''); ?>">
                            <input type="hidden" name="array[section][support_title][type]" class="form-control" value="<?php echo e($json_data->section->support_title->type ?? ''); ?>">
                            <input type="hidden" name="array[section][support_title][placeholder]" class="form-control" value="<?php echo e($json_data->section->support_title->placeholder ?? ''); ?>">


                            <?php if(isset($json_data->section->support_title->text) && (is_array($json_data->section->support_title->text) || is_object($json_data->section->support_title->text)) && isset($json_data->section->support_title->loop_number)): ?>
                                <hr/>
                                <?php for($i=0; $i<$json_data->section->support_title->loop_number; $i++): ?>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label"><?php echo e($json_data->section->support_title->lable .' '. ($i+1)); ?></label>
                                            <input type="text" name="array[section][support_title][text][<?php echo e($i); ?>]" class="form-control" id="<?php echo e(($json_data->section->support_title->lable ?? '').'_'.$i); ?>" value="<?php echo e($json_data->section->support_title->text->{$i} ?? ''); ?>">
                                        </div>
                                    </div>
                                </div>
                                <?php endfor; ?>
                            <?php else: ?>
                            <input type="text" name="array[section][support_title][text]" class="form-control" value="<?php echo e($json_data->section->support_title->text ?? ''); ?>"
                                    placeholder="<?php echo e($json_data->section->support_title->placeholder); ?>" id="<?php echo e($json_data->section->support_title->slug); ?>">
                            <?php endif; ?>

                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if(isset($json_data->section->support_value)): ?>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="form-label"><?php echo e($json_data->section->support_value->lable); ?></label>
                            <input type="hidden" name="array[section][support_value][slug]" class="form-control" value="<?php echo e($json_data->section->support_value->slug ?? ''); ?>">
                            <input type="hidden" name="array[section][support_value][lable]" class="form-control" value="<?php echo e($json_data->section->support_value->lable ?? ''); ?>">
                            <input type="hidden" name="array[section][support_value][type]" class="form-control" value="<?php echo e($json_data->section->support_value->type ?? ''); ?>">
                            <input type="hidden" name="array[section][support_value][placeholder]" class="form-control" value="<?php echo e($json_data->section->support_value->placeholder ?? ''); ?>">

                                    <?php if(isset($json_data->section->support_value->text) && (is_array($json_data->section->support_value->text) || is_object($json_data->section->support_value->text)) && isset($json_data->section->support_value->loop_number)): ?>
                                <hr/>
                                <?php for($i=0; $i<$json_data->section->support_value->loop_number; $i++): ?>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label"><?php echo e($json_data->section->support_value->lable .' '. ($i+1)); ?></label>
                                            <input type="text" name="array[section][support_value][text][<?php echo e($i); ?>]" class="form-control" id="<?php echo e(($json_data->section->support_value->lable ?? '').'_'.$i); ?>" value="<?php echo e($json_data->section->support_value->text->{$i} ?? ''); ?>">
                                        </div>
                                    </div>
                                </div>
                                <?php endfor; ?>
                            <?php else: ?>
                            <input type="text" name="array[section][support_value][text]" class="form-control" value="<?php echo e($json_data->section->support_value->text ?? ''); ?>"
                                    placeholder="<?php echo e($json_data->section->support_value->placeholder); ?>" id="<?php echo e($json_data->section->support_value->slug); ?>">
                            <?php endif; ?>

                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if(isset($json_data->section->sub_title)): ?>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="form-label"><?php echo e($json_data->section->sub_title->lable); ?></label>
                            <input type="hidden" name="array[section][sub_title][slug]" class="form-control" value="<?php echo e($json_data->section->sub_title->slug ?? ''); ?>">
                            <input type="hidden" name="array[section][sub_title][lable]" class="form-control" value="<?php echo e($json_data->section->sub_title->lable ?? ''); ?>">
                            <input type="hidden" name="array[section][sub_title][type]" class="form-control" value="<?php echo e($json_data->section->sub_title->type ?? ''); ?>">
                            <input type="hidden" name="array[section][sub_title][placeholder]" class="form-control" value="<?php echo e($json_data->section->sub_title->placeholder ?? ''); ?>">
                            <?php if(isset($json_data->section->sub_title->text) && (is_array($json_data->section->sub_title->text) || is_object($json_data->section->sub_title->text)) && isset($json_data->section->sub_title->loop_number)): ?>
                                <hr/>
                                <?php for($i=0; $i<$json_data->section->sub_title->loop_number; $i++): ?>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label"><?php echo e($json_data->section->sub_title->lable .' '. ($i+1)); ?></label>
                                            <input type="text" name="array[section][sub_title][text][<?php echo e($i); ?>]" class="form-control" id="<?php echo e(($json_data->section->sub_title->lable ?? '').'_'.$i); ?>" value="<?php echo e($json_data->section->sub_title->text->{$i} ?? ''); ?>">
                                        </div>
                                    </div>
                                </div>
                                <?php endfor; ?>
                            <?php else: ?>
                            <input type="text" name="array[section][sub_title][text]" class="form-control" value="<?php echo e($json_data->section->sub_title->text ?? ''); ?>"
                                    placeholder="<?php echo e($json_data->section->sub_title->placeholder); ?>" id="<?php echo e($json_data->section->sub_title->slug); ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if(isset($json_data->section->lable_x)): ?>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="form-label"><?php echo e($json_data->section->lable_x->lable); ?></label>
                            <input type="hidden" name="array[section][lable_x][slug]" class="form-control" value="<?php echo e($json_data->section->lable_x->slug ?? ''); ?>">
                            <input type="hidden" name="array[section][lable_x][lable]" class="form-control" value="<?php echo e($json_data->section->lable_x->lable ?? ''); ?>">
                            <input type="hidden" name="array[section][lable_x][type]" class="form-control" value="<?php echo e($json_data->section->lable_x->type ?? ''); ?>">
                            <input type="hidden" name="array[section][lable_x][placeholder]" class="form-control" value="<?php echo e($json_data->section->lable_x->placeholder ?? ''); ?>">
                            <?php if(isset($json_data->section->lable_x->text) && (is_array($json_data->section->lable_x->text) || is_object($json_data->section->lable_x->text)) && isset($json_data->section->lable_x->loop_number)): ?>
                                <hr/>
                                <?php for($i=0; $i<$json_data->section->lable_x->loop_number; $i++): ?>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label"><?php echo e($json_data->section->lable_x->lable .' '. ($i+1)); ?></label>
                                            <input type="text" name="array[section][lable_x][text][<?php echo e($i); ?>]" class="form-control" id="<?php echo e(($json_data->section->lable_x->lable ?? '').'_'.$i); ?>" value="<?php echo e($json_data->section->lable_x->text->{$i} ?? ''); ?>">
                                        </div>
                                    </div>
                                </div>
                                <?php endfor; ?>
                            <?php else: ?>
                            <input type="text" name="array[section][lable_x][text]" class="form-control" value="<?php echo e($json_data->section->lable_x->text ?? ''); ?>"
                                    placeholder="<?php echo e($json_data->section->lable_x->placeholder); ?>" id="<?php echo e($json_data->section->lable_x->slug); ?>">
                            <?php endif; ?>


                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if(isset($json_data->section->lable_y)): ?>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="form-label"><?php echo e($json_data->section->lable_y->lable); ?></label>
                            <input type="hidden" name="array[section][lable_y][slug]" class="form-control" value="<?php echo e($json_data->section->lable_y->slug ?? ''); ?>">
                            <input type="hidden" name="array[section][lable_y][lable]" class="form-control" value="<?php echo e($json_data->section->lable_y->lable ?? ''); ?>">
                            <input type="hidden" name="array[section][lable_y][type]" class="form-control" value="<?php echo e($json_data->section->lable_y->type ?? ''); ?>">
                            <input type="hidden" name="array[section][lable_y][placeholder]" class="form-control" value="<?php echo e($json_data->section->lable_y->placeholder ?? ''); ?>">

                                    <?php if(isset($json_data->section->lable_y->text) && (is_array($json_data->section->lable_y->text) || is_object($json_data->section->lable_y->text)) && isset($json_data->section->lable_y->loop_number)): ?>
                                <hr/>
                                <?php for($i=0; $i<$json_data->section->lable_y->loop_number; $i++): ?>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label"><?php echo e($json_data->section->lable_y->lable .' '. ($i+1)); ?></label>
                                            <input type="text" name="array[section][lable_y][text][<?php echo e($i); ?>]" class="form-control" id="<?php echo e(($json_data->section->lable_y->lable ?? '').'_'.$i); ?>" value="<?php echo e($json_data->section->lable_y->text->{$i} ?? ''); ?>">
                                        </div>
                                    </div>
                                </div>
                                <?php endfor; ?>
                            <?php else: ?>
                            <input type="text" name="array[section][lable_y][text]" class="form-control" value="<?php echo e($json_data->section->lable_y->text ?? ''); ?>"
                                    placeholder="<?php echo e($json_data->section->lable_y->placeholder); ?>" id="<?php echo e($json_data->section->lable_y->slug); ?>">
                            <?php endif; ?>

                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if(isset($json_data->section->copy_right)): ?>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="form-label"><?php echo e($json_data->section->copy_right->lable); ?></label>
                            <input type="hidden" name="array[section][copy_right][slug]" class="form-control" value="<?php echo e($json_data->section->copy_right->slug ?? ''); ?>">
                            <input type="hidden" name="array[section][copy_right][lable]" class="form-control" value="<?php echo e($json_data->section->copy_right->lable ?? ''); ?>">
                            <input type="hidden" name="array[section][copy_right][type]" class="form-control" value="<?php echo e($json_data->section->copy_right->type ?? ''); ?>">
                            <input type="hidden" name="array[section][copy_right][placeholder]" class="form-control" value="<?php echo e($json_data->section->copy_right->placeholder ?? ''); ?>">
                            <input type="text" name="array[section][copy_right][text]" class="form-control" value="<?php echo e($json_data->section->copy_right->text ?? ''); ?>"
                                    placeholder="<?php echo e($json_data->section->copy_right->placeholder); ?>" id="<?php echo e($json_data->section->copy_right->slug); ?>">

                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if(isset($json_data->section->privacy_policy)): ?>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="form-label"><?php echo e($json_data->section->privacy_policy->lable); ?></label>
                            <input type="hidden" name="array[section][privacy_policy][slug]" class="form-control" value="<?php echo e($json_data->section->privacy_policy->slug ?? ''); ?>">
                            <input type="hidden" name="array[section][privacy_policy][lable]" class="form-control" value="<?php echo e($json_data->section->privacy_policy->lable ?? ''); ?>">
                            <input type="hidden" name="array[section][privacy_policy][type]" class="form-control" value="<?php echo e($json_data->section->privacy_policy->type ?? ''); ?>">
                            <input type="hidden" name="array[section][privacy_policy][placeholder]" class="form-control" value="<?php echo e($json_data->section->privacy_policy->placeholder ?? ''); ?>">
                            <div class="row">
                                <div class="col-6">
                                <label class="form-label"><?php echo e(__('Label')); ?></label>
                                <input type="text" name="array[section][privacy_policy][text]" class="form-control" value="<?php echo e($json_data->section->privacy_policy->text ?? ''); ?>"
                                    placeholder="<?php echo e($json_data->section->privacy_policy->placeholder); ?>" id="<?php echo e($json_data->section->privacy_policy->slug); ?>">
                                </div>
                                <div class="col-6">
                                <label class="form-label"><?php echo e(__('Link')); ?></label>
                                    <input type="text" name="array[section][privacy_policy][link]" class="form-control" value="<?php echo e($json_data->section->privacy_policy->link ?? ''); ?>"
                                    placeholder="<?php echo e($json_data->section->privacy_policy->placeholder); ?>">
                                </div>
                            </div>

                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if(isset($json_data->section->terms_and_conditions)): ?>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="form-label"><?php echo e($json_data->section->terms_and_conditions->lable); ?></label>
                            <input type="hidden" name="array[section][terms_and_conditions][slug]" class="form-control" value="<?php echo e($json_data->section->terms_and_conditions->slug ?? ''); ?>">
                            <input type="hidden" name="array[section][terms_and_conditions][lable]" class="form-control" value="<?php echo e($json_data->section->terms_and_conditions->lable ?? ''); ?>">
                            <input type="hidden" name="array[section][terms_and_conditions][type]" class="form-control" value="<?php echo e($json_data->section->terms_and_conditions->type ?? ''); ?>">
                            <input type="hidden" name="array[section][terms_and_conditions][placeholder]" class="form-control" value="<?php echo e($json_data->section->terms_and_conditions->placeholder ?? ''); ?>">
                            <div class="row">
                                <div class="col-6 ">
                                <label class="form-label"><?php echo e(__('Label')); ?></label>
                                <input type="text" name="array[section][terms_and_conditions][text]" class="form-control" value="<?php echo e($json_data->section->terms_and_conditions->text ?? ''); ?>"
                                    placeholder="<?php echo e($json_data->section->terms_and_conditions->placeholder); ?>" id="<?php echo e($json_data->section->terms_and_conditions->slug); ?>">
                                </div>
                                <div class="col-6">
                                <label class="form-label"><?php echo e(__('Link')); ?></label>
                                    <input type="text" name="array[section][terms_and_conditions][link]" class="form-control" value="<?php echo e($json_data->section->terms_and_conditions->link ?? ''); ?>"
                                    placeholder="<?php echo e($json_data->section->terms_and_conditions->placeholder); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if(isset($json_data->section->button)): ?>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="form-label"><?php echo e($json_data->section->button->lable); ?></label>
                            <input type="hidden" name="array[section][button][slug]" class="form-control" value="<?php echo e($json_data->section->button->slug ?? ''); ?>">
                            <input type="hidden" name="array[section][button][lable]" class="form-control" value="<?php echo e($json_data->section->button->lable ?? ''); ?>">
                            <input type="hidden" name="array[section][button][type]" class="form-control" value="<?php echo e($json_data->section->button->type ?? ''); ?>">
                            <input type="hidden" name="array[section][button][placeholder]" class="form-control" value="<?php echo e($json_data->section->button->placeholder ?? ''); ?>">
                            <?php if(isset($json_data->section->button->text) && (is_array($json_data->section->button->text) || is_object($json_data->section->button->text)) && isset($json_data->section->button->loop_number)): ?>
                                <hr/>
                                <?php for($i=0; $i<$json_data->section->button->loop_number; $i++): ?>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label"><?php echo e($json_data->section->button->lable .' '. ($i+1)); ?></label>
                                            <input type="text" name="array[section][button][text][<?php echo e($i); ?>]" class="form-control" id="<?php echo e(($json_data->section->button->lable ?? '').'_'.$i); ?>" value="<?php echo e($json_data->section->button->text->{$i} ?? ''); ?>">
                                        </div>
                                    </div>
                                </div>
                                <?php endfor; ?>
                            <?php else: ?>
                            <input type="text" name="array[section][button][text]" class="form-control" value="<?php echo e($json_data->section->button->text ?? ''); ?>"
                                    placeholder="<?php echo e($json_data->section->button->placeholder); ?>" id="<?php echo e($json_data->section->button->slug); ?>">
                            <?php endif; ?>


                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if(isset($json_data->section->button_second)): ?>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label"><?php echo e($json_data->section->button_second->lable); ?></label>
                                <input type="hidden" name="array[section][button_second][slug]" class="form-control" value="<?php echo e($json_data->section->button_second->slug ?? ''); ?>">
                                <input type="hidden" name="array[section][button_second][lable]" class="form-control" value="<?php echo e($json_data->section->button_second->lable ?? ''); ?>">
                                <input type="hidden" name="array[section][button_second][type]" class="form-control" value="<?php echo e($json_data->section->button_second->type ?? ''); ?>">
                                <input type="hidden" name="array[section][button_second][placeholder]" class="form-control" value="<?php echo e($json_data->section->button_second->placeholder ?? ''); ?>">
                                <input type="text" name="array[section][button_second][text]" class="form-control" value="<?php echo e($json_data->section->button_second->text ?? ''); ?>"
                                        placeholder="<?php echo e($json_data->section->button_second->placeholder); ?>" id="<?php echo e($json_data->section->button_second->slug ?? ''); ?>">

                            </div>
                        </div>
                        <?php endif; ?>
                    <?php if(isset($json_data->section->description)): ?>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="form-label"><?php echo e($json_data->section->description->lable); ?></label>
                            <input type="hidden" name="array[section][description][slug]" class="form-control" value="<?php echo e($json_data->section->description->slug ?? ''); ?>">
                            <input type="hidden" name="array[section][description][lable]" class="form-control" value="<?php echo e($json_data->section->description->lable ?? ''); ?>">
                            <input type="hidden" name="array[section][description][type]" class="form-control" value="<?php echo e($json_data->section->description->type ?? ''); ?>">
                            <input type="hidden" name="array[section][description][placeholder]" class="form-control" value="<?php echo e($json_data->section->description->placeholder ?? ''); ?>">
                            <textarea type="text" name="array[section][description][text]" class="form-control"
                                    placeholder="<?php echo e($json_data->section->description->placeholder); ?>" id="<?php echo e($json_data->section->description->slug); ?>"> <?php echo e($json_data->section->description->text); ?> </textarea>

                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if(isset($json_data->section->newsletter_title)): ?>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="form-label"><?php echo e($json_data->section->newsletter_title->lable); ?></label>
                            <input type="hidden" name="array[section][newsletter_title][slug]" class="form-control" value="<?php echo e($json_data->section->newsletter_title->slug ?? ''); ?>">
                            <input type="hidden" name="array[section][newsletter_title][lable]" class="form-control" value="<?php echo e($json_data->section->newsletter_title->lable ?? ''); ?>">
                            <input type="hidden" name="array[section][newsletter_title][type]" class="form-control" value="<?php echo e($json_data->section->newsletter_title->type ?? ''); ?>">
                            <input type="hidden" name="array[section][newsletter_title][placeholder]" class="form-control" value="<?php echo e($json_data->section->newsletter_title->placeholder ?? ''); ?>">
                            <input type="text" name="array[section][newsletter_title][text]" class="form-control"
                                    placeholder="<?php echo e($json_data->section->newsletter_title->placeholder); ?>" id="<?php echo e($json_data->section->newsletter_title->slug); ?>" value="<?php echo e($json_data->section->newsletter_title->text ?? ''); ?>">

                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if(isset($json_data->section->newsletter_button)): ?>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="form-label"><?php echo e($json_data->section->newsletter_button->lable); ?></label>
                            <input type="hidden" name="array[section][newsletter_button][slug]" class="form-control" value="<?php echo e($json_data->section->newsletter_button->slug ?? ''); ?>">
                            <input type="hidden" name="array[section][newsletter_button][lable]" class="form-control" value="<?php echo e($json_data->section->newsletter_button->lable ?? ''); ?>">
                            <input type="hidden" name="array[section][newsletter_button][type]" class="form-control" value="<?php echo e($json_data->section->newsletter_button->type ?? ''); ?>">
                            <input type="hidden" name="array[section][newsletter_button][placeholder]" class="form-control" value="<?php echo e($json_data->section->newsletter_button->placeholder ?? ''); ?>">
                            <input type="text" name="array[section][newsletter_button][text]" class="form-control"
                                    placeholder="<?php echo e($json_data->section->newsletter_button->placeholder); ?>" id="<?php echo e($json_data->section->newsletter_button->slug); ?>" value="<?php echo e($json_data->section->newsletter_button->text ?? ''); ?>">

                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if(isset($json_data->section->newsletter_sub_title)): ?>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="form-label"><?php echo e($json_data->section->newsletter_sub_title->lable); ?></label>
                            <input type="hidden" name="array[section][newsletter_sub_title][slug]" class="form-control" value="<?php echo e($json_data->section->newsletter_sub_title->slug ?? ''); ?>">
                            <input type="hidden" name="array[section][newsletter_sub_title][lable]" class="form-control" value="<?php echo e($json_data->section->newsletter_sub_title->lable ?? ''); ?>">
                            <input type="hidden" name="array[section][newsletter_sub_title][type]" class="form-control" value="<?php echo e($json_data->section->newsletter_sub_title->type ?? ''); ?>">
                            <input type="hidden" name="array[section][newsletter_sub_title][placeholder]" class="form-control" value="<?php echo e($json_data->section->newsletter_sub_title->placeholder ?? ''); ?>">
                            <textarea type="text" name="array[section][newsletter_sub_title][text]" class="form-control"
                                    placeholder="<?php echo e($json_data->section->newsletter_sub_title->placeholder); ?>" id="<?php echo e($json_data->section->newsletter_sub_title->slug); ?>"> <?php echo e($json_data->section->newsletter_sub_title->text); ?> </textarea>

                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if(isset($json_data->section->newsletter_description)): ?>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="form-label"><?php echo e($json_data->section->newsletter_description->lable); ?></label>
                            <input type="hidden" name="array[section][newsletter_description][slug]" class="form-control" value="<?php echo e($json_data->section->newsletter_description->slug ?? ''); ?>">
                            <input type="hidden" name="array[section][newsletter_description][lable]" class="form-control" value="<?php echo e($json_data->section->newsletter_description->lable ?? ''); ?>">
                            <input type="hidden" name="array[section][newsletter_description][type]" class="form-control" value="<?php echo e($json_data->section->newsletter_description->type ?? ''); ?>">
                            <input type="hidden" name="array[section][newsletter_description][placeholder]" class="form-control" value="<?php echo e($json_data->section->newsletter_description->placeholder ?? ''); ?>">
                            <textarea type="text" name="array[section][newsletter_description][text]" class="form-control"
                                    placeholder="<?php echo e($json_data->section->newsletter_description->placeholder); ?>" id="<?php echo e($json_data->section->newsletter_description->slug); ?>"> <?php echo e($json_data->section->newsletter_description->text); ?> </textarea>

                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if(isset($json_data->section->footer_cookie)): ?>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label"><?php echo e($json_data->section->footer_cookie->lable); ?></label>
                                <input type="hidden" name="array[section][footer_cookie][slug]" class="form-control" value="<?php echo e($json_data->section->footer_cookie->slug ?? ''); ?>">
                                <input type="hidden" name="array[section][footer_cookie][lable]" class="form-control" value="<?php echo e($json_data->section->footer_cookie->lable ?? ''); ?>">
                                <input type="hidden" name="array[section][footer_cookie][type]" class="form-control" value="<?php echo e($json_data->section->footer_cookie->type ?? ''); ?>">
                                <input type="hidden" name="array[section][footer_cookie][placeholder]" class="form-control" value="<?php echo e($json_data->section->footer_cookie->placeholder ?? ''); ?>">
                                <input type="text" name="array[section][footer_cookie][text]" class="form-control" value="<?php echo e($json_data->section->footer_cookie->text ?? ''); ?>"
                                        placeholder="<?php echo e($json_data->section->footer_cookie->placeholder); ?>" id="<?php echo e($json_data->section->footer_cookie->slug); ?>">
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($json_data->section->footer_link)): ?>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="form-label"><?php echo e($json_data->section->footer_link->lable); ?></label>
                            <input type="hidden" name="array[section][footer_link][slug]" class="form-control" value="<?php echo e($json_data->section->footer_link->slug ?? ''); ?>">
                            <input type="hidden" name="array[section][footer_link][lable]" class="form-control" value="<?php echo e($json_data->section->footer_link->lable ?? ''); ?>">
                            <input type="hidden" name="array[section][footer_link][type]" class="form-control" value="<?php echo e($json_data->section->footer_link->type ?? ''); ?>">
                            <input type="hidden" name="array[section][footer_link][text]" class="form-control" value="<?php echo e($json_data->section->footer_link->text ?? ''); ?>">
                            <input type="hidden" name="array[section][footer_link][loop_number]" class="form-control" value="<?php echo e($json_data->section->footer_link->loop_number ?? ''); ?>">
                            <hr/>
                            <?php if(isset($json_data->section->footer_link->type) && ($json_data->section->footer_link->type == 'array') && isset($json_data->section->footer_link->loop_number)): ?>
                                <?php for($i=0; $i<$json_data->section->footer_link->loop_number; $i++): ?>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label"><?php echo e(__('Social Link')); ?></label>
                                            <input type="text" name="array[section][footer_link][social_link][<?php echo e($i); ?>]" class="form-control" id="social_link_<?php echo e($i); ?>" value="<?php echo e($json_data->section->footer_link->social_link->{$i} ?? ''); ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label"><?php echo e(__('Social Icon')); ?></label>
                                            <input type="file" name="array[section][footer_link][social_icon][<?php echo e($i); ?>][text]" class="form-control" id="social_icon_<?php echo e($i); ?>">
                                            <input type="hidden" name="array[section][footer_link][social_icon][<?php echo e($i); ?>][image]" class="form-control" id="social_icon_<?php echo e($i); ?>" value="<?php echo e($json_data->section->footer_link->social_icon->{$i}->image ?? ''); ?>">

                                            <img src="<?php echo e(asset($json_data->section->footer_link->social_icon->{$i}->image ?? '')); ?>" class="<?php echo e('social_icon_'. $i .'_preview'); ?> social_icon" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                                <?php endfor; ?>
                           <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if(isset($json_data->section->announce_title)): ?>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="form-label"><?php echo e($json_data->section->announce_title->lable); ?></label>
                            <input type="hidden" name="array[section][announce_title][slug]" class="form-control" value="<?php echo e($json_data->section->announce_title->slug ?? ''); ?>">
                            <input type="hidden" name="array[section][announce_title][lable]" class="form-control" value="<?php echo e($json_data->section->announce_title->lable ?? ''); ?>">
                            <input type="hidden" name="array[section][announce_title][type]" class="form-control" value="<?php echo e($json_data->section->announce_title->type ?? ''); ?>">
                            <input type="hidden" name="array[section][announce_title][text]" class="form-control" value="<?php echo e($json_data->section->announce_title->text ?? ''); ?>">
                            <input type="hidden" name="array[section][announce_title][loop_number]" class="form-control" value="<?php echo e($json_data->section->announce_title->loop_number ?? ''); ?>">
                            <hr/>
                            <?php if(isset($json_data->section->announce_title->type) && ($json_data->section->announce_title->type == 'array') && isset($json_data->section->announce_title->loop_number)): ?>
                            <?php for($i=0; $i<$json_data->section->announce_title->loop_number; $i++): ?>
                                <input type="text" name="array[section][announce_title][annouce_text][<?php echo e($i); ?>][text]"
                                class="form-control"
                                value="<?php echo e($json_data->section->announce_title->annouce_text->{$i}->text ?? ''); ?>"
                                placeholder="<?php echo e($json_data->section->announce_title->placeholder); ?>"
                                id="<?php echo e($json_data->section->announce_title->slug.'_'.$i); ?>">
                                <?php endfor; ?>
                           <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if(isset($json_data->section->image)): ?>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="form-label"><?php echo e($json_data->section->image->lable); ?></label>
                            <input type="hidden" name="array[section][image][slug]" class="form-control" value="<?php echo e($json_data->section->image->slug ?? ''); ?>">
                            <input type="hidden" name="array[section][image][lable]" class="form-control" value="<?php echo e($json_data->section->image->lable ?? ''); ?>">
                            <input type="hidden" name="array[section][image][type]" class="form-control" value="<?php echo e($json_data->section->image->type ?? ''); ?>">
                            <input type="hidden" name="array[section][image][placeholder]" class="form-control" value="<?php echo e($json_data->section->image->placeholder ?? ''); ?>">
                            <?php if(isset($json_data->section->image->image) && (is_array($json_data->section->image->image) || is_object($json_data->section->image->image)) && isset($json_data->section->image->loop_number)): ?>
                                <hr/>
                                <?php for($i=0; $i<$json_data->section->image->loop_number; $i++): ?>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label"><?php echo e($json_data->section->image->lable .' '. ($i+1)); ?></label>
                                            <input type="hidden" name="array[section][image][image][<?php echo e($i); ?>]" class="form-control" value="<?php echo e($json_data->section->image->image->{$i} ?? ''); ?>">
                            <input type="file" name="array[section][image][text][<?php echo e($i); ?>]" class="form-control"
                                    placeholder="<?php echo e($json_data->section->image->placeholder); ?>" id="<?php echo e($json_data->section->image->slug); ?>" multiple>

                                    <img src="<?php echo e(asset($json_data->section->image->image->{$i})); ?>" style="width: 100px; height: 100px;" class="<?php echo e($json_data->section->image->slug. $i .'_preview'); ?>" accept="image/*" multiple>
                                        </div>
                                    </div>
                                </div>
                                <?php endfor; ?>
                            <?php else: ?>
                                <?php if(is_array($json_data->section->image->image) || is_object($json_data->section->image->image)): ?>

                                <input type="file" name="array[section][image][text][]" class="form-control"
                                        placeholder="<?php echo e($json_data->section->image->placeholder); ?>" id="<?php echo e($json_data->section->image->slug); ?>" multiple>

                                        <?php $__currentLoopData = objectToArray($json_data->section->image->image); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <input type="hidden" name="array[section][image][image][]" class="form-control" value="<?php echo e($image); ?>">
                                        <img src="<?php echo e(asset($image)); ?>" style="width:80%; height: 200px;object-fit: cover;margin-top: 10px;" class="<?php echo e($json_data->section->image->slug. $key .'_preview'); ?>" accept="image/*" multiple>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php else: ?>
                                <input type="hidden" name="array[section][image][image]" class="form-control" value="<?php echo e($json_data->section->image->image ?? ''); ?>">
                                <input type="file" name="array[section][image][text]" class="form-control"
                                        placeholder="<?php echo e($json_data->section->image->placeholder); ?>" id="<?php echo e($json_data->section->image->slug); ?>"  accept="image/*, video/*">
                                <img src="<?php echo e(asset($json_data->section->image->image)); ?>" style="width:80%; height: 200px;object-fit: cover;margin-top: 10px;" class="<?php echo e($json_data->section->image->slug.'_preview'); ?>" accept="image/*">
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    

                    <?php if(isset($json_data->section->image_left)): ?>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="form-label"><?php echo e($json_data->section->image_left->lable); ?></label>
                            <input type="hidden" name="array[section][image_left][slug]" class="form-control" value="<?php echo e($json_data->section->image_left->slug ?? ''); ?>">
                            <input type="hidden" name="array[section][image_left][lable]" class="form-control" value="<?php echo e($json_data->section->image_left->lable ?? ''); ?>">
                            <input type="hidden" name="array[section][image_left][type]" class="form-control" value="<?php echo e($json_data->section->image_left->type ?? ''); ?>">
                            <input type="hidden" name="array[section][image_left][placeholder]" class="form-control" value="<?php echo e($json_data->section->image_left->placeholder ?? ''); ?>">
                            <?php if(is_array($json_data->section->image_left->image) || is_object($json_data->section->image_left->image)): ?>
                            <input type="hidden" name="array[section][image_left][image][]" class="form-control" value="<?php echo e(json_encode($json_data->section->image_left->image ?? [])); ?>">
                            <input type="file" name="array[section][image_left][text][]" class="form-control"
                                    placeholder="<?php echo e($json_data->section->image_left->placeholder); ?>" id="<?php echo e($json_data->section->image_left->slug); ?>" multiple>

                                    <?php $__currentLoopData = objectToArray($json_data->section->image_left->image); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <img src="<?php echo e(asset($image)); ?>" style="width:80%; height: 200px;object-fit: cover;margin-top: 10px;" class="<?php echo e($json_data->section->image_left->slug. $key .'_preview'); ?>" accept="image/*" multiple>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php else: ?>
                            <input type="hidden" name="array[section][image_left][image]" class="form-control" value="<?php echo e($json_data->section->image_left->image ?? ''); ?>">
                            <input type="file" name="array[section][image_left][text]" class="form-control"
                                    placeholder="<?php echo e($json_data->section->image_left->placeholder); ?>" id="<?php echo e($json_data->section->image_left->slug); ?>">
                            <img src="<?php echo e(asset($json_data->section->image_left->image)); ?>" style="width:80%; height: 200px;object-fit: cover;margin-top: 10px;" class="<?php echo e($json_data->section->image_left->slug.'_preview'); ?>" accept="image/*">
                            <?php endif; ?>

                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if(isset($json_data->section->image_right)): ?>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="form-label"><?php echo e($json_data->section->image_right->lable); ?></label>
                            <input type="hidden" name="array[section][image_right][slug]" class="form-control" value="<?php echo e($json_data->section->image_right->slug ?? ''); ?>">
                            <input type="hidden" name="array[section][image_right][lable]" class="form-control" value="<?php echo e($json_data->section->image_right->lable ?? ''); ?>">
                            <input type="hidden" name="array[section][image_right][type]" class="form-control" value="<?php echo e($json_data->section->image_right->type ?? ''); ?>">
                            <input type="hidden" name="array[section][image_right][placeholder]" class="form-control" value="<?php echo e($json_data->section->image_right->placeholder ?? ''); ?>">
                            <?php if(is_array($json_data->section->image_right->image) || is_object($json_data->section->image_right->image)): ?>
                            <input type="hidden" name="array[section][image_right][image][]" class="form-control" value="<?php echo e(json_encode($json_data->section->image_right->image ?? [])); ?>">
                            <input type="file" name="array[section][image_right][text][]" class="form-control"
                                    placeholder="<?php echo e($json_data->section->image_right->placeholder); ?>" id="<?php echo e($json_data->section->image_right->slug); ?>" multiple>

                                    <?php $__currentLoopData = objectToArray($json_data->section->image_right->image); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <img src="<?php echo e(asset($image)); ?>" style="width:80%; height: 200px;object-fit: cover;margin-top: 10px;" class="<?php echo e($json_data->section->image_right->slug. $key .'_preview'); ?>" accept="image/*" multiple>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php else: ?>
                            <input type="hidden" name="array[section][image_right][image]" class="form-control" value="<?php echo e($json_data->section->image_right->image ?? ''); ?>">
                            <input type="file" name="array[section][image_right][text]" class="form-control"
                                    placeholder="<?php echo e($json_data->section->image_right->placeholder); ?>" id="<?php echo e($json_data->section->image_right->slug); ?>">
                            <img src="<?php echo e(asset($json_data->section->image_right->image)); ?>" style="width:80%; height: 200px;object-fit: cover;margin-top: 10px;" class="<?php echo e($json_data->section->image_right->slug.'_preview'); ?>" accept="image/*">
                            <?php endif; ?>

                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if(isset($json_data->section->product_type)): ?>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label
                                class="form-label"><?php echo e($json_data->section->product_type->lable); ?></label>
                            <input type="hidden" name="array[section][product_type][slug]" class="form-control" value="<?php echo e($json_data->section->product_type->slug ?? ''); ?>">
                            <input type="hidden" name="array[section][product_type][lable]" class="form-control" value="<?php echo e($json_data->section->product_type->lable ?? ''); ?>">
                            <input type="hidden" name="array[section][product_type][type]" class="form-control" value="<?php echo e($json_data->section->product_type->type ?? ''); ?>">
                            <input type="hidden" name="array[section][product_type][placeholder]" class="form-control" value="<?php echo e($json_data->section->product_type->placeholder ?? ''); ?>">
                            <select class="form-control"
                                    name="array[section][product_type][text]"
                                    rows="3" id="<?php echo e($json_data->section->product_type->slug); ?>">
                                <option value><?php echo e(__('Select Option')); ?></option>
                                    <?php $__currentLoopData = config('theme_form_options.product'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>" <?php echo e(($key == $json_data->section->product_type->text) ? 'selected' : ''); ?>><?php echo e($option); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="form-label product_ids"><?php echo e(__('Custom Products')); ?></label>
                            <?php
                                $productIds = isset($json_data->section->product_type->product_ids) && is_object($json_data->section->product_type->product_ids) ? (array) $json_data->section->product_type->product_ids: [];
                                if (!isset($json_data->section->product_type->product_ids)) {
                                    $productIds = $json_data->section->product_ids ?? [];
                                }
                            ?>
                                <select class="form-control product_ids"
                                        name="array[section][product_type][product_ids][]"
                                        id="product_ids" multiple>
                                        <option value>Select Option</option>
                                        <?php $__currentLoopData = $produtcs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($product->id); ?>" <?php echo e(in_array($product->id, $productIds) ? 'selected' : ''); ?>><?php echo e($product->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if(isset($json_data->section->menu_type)): ?>
                        <?php
                            $menuIds = isset($json_data->section->menu_type->menu_ids) ? (array) $json_data->section->menu_type->menu_ids : [];
                            if (empty($menuIds)) {
                                $menuIds = isset($json_data->section->menu_ids) ? (array) $json_data->section->menu_ids : [];
                            }
                        ?>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label"><?php echo e(__('Select Menu ')); ?></label>
                                <select class="form-control menu_ids"
                                        name="array[section][menu_type][menu_ids][]"
                                        id="menu_ids">
                                    <option value><?php echo e(__('Select Option')); ?></option>
                                    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($menu->id); ?>" <?php echo e(in_array($menu->id, $menuIds) ? 'selected' : ''); ?>><?php echo e($menu->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if(isset($json_data->section->footer_menu_type)): ?>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label"><?php echo e($json_data->section->footer_menu_type->lable); ?></label>
                                <input type="hidden" name="array[section][footer_menu_type][slug]" class="form-control" value="<?php echo e($json_data->section->footer_menu_type->slug ?? ''); ?>">
                                <input type="hidden" name="array[section][footer_menu_type][lable]" class="form-control" value="<?php echo e($json_data->section->footer_menu_type->lable ?? ''); ?>">
                                <input type="hidden" name="array[section][footer_menu_type][type]" class="form-control" value="<?php echo e($json_data->section->footer_menu_type->type ?? ''); ?>">
                                <input type="hidden" name="array[section][footer_menu_type][text]" class="form-control" value="<?php echo e($json_data->section->footer_menu_type->text ?? ''); ?>">
                                <input type="hidden" name="array[section][footer_menu_type][loop_number]" class="form-control" value="<?php echo e($json_data->section->footer_menu_type->loop_number ?? ''); ?>">
                                <hr/>
                                <?php if(isset($json_data->section->footer_menu_type->type) && ($json_data->section->footer_menu_type->type == 'array') && isset($json_data->section->footer_menu_type->loop_number)): ?>
                                    <?php for($i=0; $i<$json_data->section->footer_menu_type->loop_number; $i++): ?>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo e(__('Footer Title')); ?></label>
                                                <input type="text" name="array[section][footer_menu_type][footer_title][<?php echo e($i); ?>]" class="form-control" id="footer_title_<?php echo e($i); ?>" value="<?php echo e($json_data->section->footer_menu_type->footer_title->{$i} ?? ''); ?>" placeholder="Enter text here....">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo e(__('Footer Menu')); ?></label>
                                                <?php
                                                    $menuIds = isset($json_data->section->footer_menu_type->footer_menu_ids) && is_object($json_data->section->footer_menu_type->footer_menu_ids)
                                                        ? (array) $json_data->section->footer_menu_type->footer_menu_ids : [];

                                                    if (!isset($json_data->section->footer_menu_type->footer_menu_ids)) {
                                                        $menuIds = $json_data->section->footer_menu_type->footer_menu_ids ?? [];
                                                    }
                                                ?>
                                                <select class="form-control" name="array[section][footer_menu_type][footer_menu_ids][]" id="">
                                                    <option value><?php echo e(__('Select Option')); ?></option>

                                                    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($menu->id); ?>" <?php echo e(in_array($menu->id, $menuIds) ? 'selected' : ''); ?>><?php echo e($menu->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endfor; ?>
                            <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <?php endfor; ?>
        </div>
        <div class="card-footer">
            <?php if(isset($json_data->section_slug) && $json_data->section_slug == 'slider' && $json_data->array_type == 'multi-inner-list'): ?>
            <div class="row">
                <div class="col-sm-12 text-end">
                    <button class="btn btn-primary btn-badge add-new-slider-btn"><?php echo e(__('Add New Slider')); ?></button>
                    <button class="btn btn-danger btn-badge delete-slider-btn" <?php if(isset($json_data->loop_number) && $json_data->loop_number < 4): ?> disabled="true" <?php endif; ?>><?php echo e(__('Delete Slider')); ?></button>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php echo Form::close(); ?>

<?php endif; ?>
<?php /**PATH B:\xampp\htdocs\ecommers\resources\views/theme_preview/section_form.blade.php ENDPATH**/ ?>