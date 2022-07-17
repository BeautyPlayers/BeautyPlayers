/*
Author       : Dreamguys
Template Name: Doccure - Bootstrap Template
Version      : 1.0
*/

(function($) {
    "use strict";

	// Pricing Options Show

	$('#pricing_select input[name="rating_option"]').on('click', function() {
		if ($(this).val() == 'price_free') {
			$('#custom_price_cont').hide();
		}
		if ($(this).val() == 'custom_price') {
			$('#custom_price_cont').show();
		}
		else {
		}
	});

	// Education Add More

    $(".education-info").on('click','.trash', function () {
		$(this).closest('.education-cont').remove();
		return false;
    });

    var i = $('#i').attr('data-id');

    $(".add-education").on('click', function () {
        ++i;
		var educationcontent = '<div class="row form-row education-cont">' +
			'<div class="col-12 col-md-10 col-lg-11">' +
				'<div class="row form-row">' +
					'<div class="col-12 col-md-6 col-lg-4">' +
						'<div class="form-group">' +
							'<label>Degree</label>' +
							'<input type="text" class="form-control" name="education['+i+'][degree]">' +
						'</div>' +
					'</div>' +
					'<div class="col-12 col-md-6 col-lg-4">' +
						'<div class="form-group">' +
							'<label>College/Institute</label>' +
							'<input type="text" class="form-control" name="education['+i+'][college]">' +
						'</div>' +
					'</div>' +
					'<div class="col-12 col-md-6 col-lg-4">' +
						'<div class="form-group">' +
							'<label>Year of Completion</label>' +
							'<input type="text" class="form-control" name="education['+i+'][year]">' +
						'</div>' +
					'</div>' +
                    '<div class="col-12 col-md-6 col-lg-4">' +
                        '<div class="form-group">' +
                            '<div class="change-avatar">' +
                                '<div class="profile-img">' +
                                    '<img src="/assets/img/placeholder.jpg" >' +
                                '</div>' +
                                '<div class="upload-img">' +
                                    '<div class="change-photo-btn">' +
                                        '<span><i class="fa fa-upload"></i> Upload Photo</span>' +
                                        '<input type="file" class="upload" name="education['+i+'][photo]">' +
                                    '</div>' +
                                    '<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                        '<input type="hidden" value="'+ null +'" name="education['+i+'][prev_photo]">' +
                    '</div>' +
				'</div>' +
			'</div>' +
			'<div class="col-12 col-md-2 col-lg-1"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>' +
		'</div>';

        $(".education-info").append(educationcontent);
        return false;
    });

	// Experience Add More

    $(".experience-info").on('click','.trash', function () {
		$(this).closest('.experience-cont').remove();
		return false;
    });

    var ei = $('#ei').attr('data-id');
    $(".add-experience").on('click', function () {
        ++ei;

		var experiencecontent = '<div class="row form-row experience-cont">' +
			'<div class="col-12 col-md-10 col-lg-11">' +
				'<div class="row form-row">' +
					'<div class="col-12 col-md-6 col-lg-4">' +
						'<div class="form-group">' +
							'<label>Shop Name</label>' +
							'<input type="text" class="form-control" name="experience['+ei+'][name]">' +
						'</div>' +
					'</div>' +
					'<div class="col-12 col-md-6 col-lg-4">' +
						'<div class="form-group">' +
							'<label>From</label>' +
							'<input type="text" class="form-control" name="experience['+ei+'][from]">' +
						'</div>' +
					'</div>' +
					'<div class="col-12 col-md-6 col-lg-4">' +
						'<div class="form-group">' +
							'<label>To</label>' +
							'<input type="text" class="form-control" name="experience['+ei+'][to]">' +
						'</div>' +
					'</div>' +
					'<div class="col-12 col-md-6 col-lg-4">' +
						'<div class="form-group">' +
							'<label>Designation</label>' +
							'<input type="text" class="form-control" name="experience['+ei+'][designation]">' +
						'</div>' +
					'</div>' +
                '<div class="col-12 col-md-6 col-lg-4">' +
                    '<div class="form-group">' +
                        '<div class="change-avatar">' +
                            '<div class="profile-img">' +
                            '<img src="/assets/img/placeholder.jpg" >' +
                            '</div>' +
                                '<div class="upload-img">' +
                                    '<div class="change-photo-btn">' +
                                    '<span><i class="fa fa-upload"></i> Upload Photo</span>' +
                                    '<input type="file" class="upload" name="experience['+ei+'][photo]">' +
                                    '</div>' +
                                '<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                    '<input type="hidden" value="'+ null +'" name="experience['+ei+'][prev_photo]">' +
                    '</div>' +
				'</div>' +
			'</div>' +
			'<div class="col-12 col-md-2 col-lg-1"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>' +
		'</div>';

        $(".experience-info").append(experiencecontent);
        return false;
    });

	// Awards Add More

    $(".awards-info").on('click','.trash', function () {
		$(this).closest('.awards-cont').remove();
		return false;
    });

    var a = $('#a').attr('data-id');
    $(".add-award").on('click', function () {
        ++a;

        var regcontent = '<div class="row form-row awards-cont">' +
			'<div class="col-12 col-md-5">' +
				'<div class="form-group">' +
					'<label>Awards</label>' +
					'<input type="text" class="form-control" name="awards['+a+'][award]">' +
				'</div>' +
			'</div>' +
			'<div class="col-12 col-md-5">' +
				'<div class="form-group">' +
					'<label>Year</label>' +
					'<input type="text" class="form-control" name="awards['+a+'][year]">' +
				'</div>' +
			'</div>' +
			'<div class="col-12 col-md-2">' +
				'<label class="d-md-block d-sm-none d-none">&nbsp;</label>' +
				'<a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a>' +
			'</div>' +
		'</div>';

        $(".awards-info").append(regcontent);
        return false;
    });

	// Membership Add More

    $(".membership-info").on('click','.trash', function () {
		$(this).closest('.membership-cont').remove();
		return false;
    });

    var m = $('#m').attr('data-id');
    $(".add-membership").on('click', function () {
        ++m;

        var membershipcontent = '<div class="row form-row membership-cont">' +
			'<div class="col-12 col-md-10 col-lg-5">' +
				'<div class="form-group">' +
					'<label>Memberships</label>' +
					'<input type="text" class="form-control" name="memberships['+m+'][membership]">' +
				'</div>' +
			'</div>' +
			'<div class="col-12 col-md-2 col-lg-2">' +
				'<label class="d-md-block d-sm-none d-none">&nbsp;</label>' +
				'<a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a>' +
			'</div>' +
		'</div>';

        $(".membership-info").append(membershipcontent);
        return false;
    });

	// Registration Add More

    $(".registrations-info").on('click','.trash', function () {
		$(this).closest('.reg-cont').remove();
		return false;
    });
    var r = $('#r').attr('data-id');
    $(".add-reg").on('click', function () {
        ++r;
        var regcontent = '<div class="row form-row reg-cont">' +
			'<div class="col-12 col-md-5">' +
				'<div class="form-group">' +
					'<label>Registrations</label>' +
					'<input type="text" class="form-control" name="regs['+r+'][registration]">' +
				'</div>' +
			'</div>' +
			'<div class="col-12 col-md-5">' +
				'<div class="form-group">' +
					'<label>Year</label>' +
					'<input type="text" class="form-control" name="regs['+r+'][year]">' +
				'</div>' +
			'</div>' +
			'<div class="col-12 col-md-2">' +
				'<label class="d-md-block d-sm-none d-none">&nbsp;</label>' +
				'<a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a>' +
			'</div>' +
            '<div class="col-12 col-md-6 col-lg-4">' +
            '<div class="form-group">' +
            '<div class="change-avatar">' +
            '<div class="profile-img">' +
            '<img src="/assets/img/placeholder.jpg" >' +
            '</div>' +
            '<div class="upload-img">' +
            '<div class="change-photo-btn">' +
            '<span><i class="fa fa-upload"></i> Upload Photo</span>' +
            '<input type="file" class="upload" name="regs['+r+'][photo]">' +
            '</div>' +
            '<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<input type="hidden" value="'+ null +'" name="regs['+r+'][prev_photo]">' +
            '</div>' +
		'</div>';

        $(".registrations-info").append(regcontent);
        return false;
    });

})(jQuery);
