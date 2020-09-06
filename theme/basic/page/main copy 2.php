<style>
    #section-estimate .estimate-group{ display:none; }

	.estimate-select ul{
		max-height: 200px; overflow-y: auto; overflow-x:hidden;
	}
</style>

<script>
$(function(){

	$(window).scroll(function(){

		if( $(window).scrollTop() == 0 )	$( "#site-header" ).removeClass( "scrolled" );
		else								$( "#site-header" ).addClass( "scrolled" );

	}).scroll();

 	$('#section-estimate .estimate-group:first').show();
 	$( "#estimate-tabs a" ).click(function(){

 		$('#section-estimate form').each(function(){
 			$("input[type=radio][checked]").attr('checked', false);
 			this.reset(); 	// ?
 		});

 		_idx = $('#estimate-tabs a').index( $(this) );

 		$('#estimate-tabs a.active').removeClass('active');
 		$('#estimate-tabs a').eq(_idx).addClass('active');


 		$('#section-estimate .estimate-group').hide();
 		$('#section-estimate .estimate-group').eq(_idx).show();

 	});

 	$( "#estimate-tabs a:first" ).click();
});
</script>

<div id="site-landing" class="wrapper">
	<div class="landing-slider">
		<ul>
			<li class="lading-slider-li-view" >
				<div class="vertical-center" style="">
					<div class="background_slow" style="background:url(/assets/images/motif/slider-tmp-01.jpg); background-size: cover;background-position: center;"></div>
					<div class="container row">
						<div class="contents-div">
							<div class="section-header">
								<div class="primary">첫 도배를 위한</div>
								<div class="secondary">간단 시공 가이드</div>
                                <div class="third">클릭한번으로 쉽게 인테리어를 바꿔보세요</div>
							</div>
							<div class="btn-div">
								<a>견적내기 ></a>
							</div>
						</div>
					</div>
				</div>
				<div class="clear"> </div>
			</li>
            <li class="lading-slider-li-view" >
				<div class="background_slow" style="background:url(/assets/images/main/banner.jpg); background-size: cover;background-position: center;"></div>
                <div class="vertical-center" style="">
                    <div class="container row">
                        <div class="contents-div">
                            <div class="section-header">
                                <div class="primary">첫 도배를 위한</div>
                                <div class="secondary">간단 시공 가이드</div>
                                <div class="third">클릭한번으로 쉽게 인테리어를 바꿔보세요</div>
                            </div>
                            <div class="btn-div">
								<a>견적내기 ></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear"> </div>
            </li>
		</ul>
	</div>
</div><!--.section-->

<div id=section-estimate class="wrapper">
	<div class="row">

			<div id="estimate-tabs">
           		<a class="fl">도배</a>
           		<a class="fl">장판</a>
           		<a class="fl">마루</a>
			</div>

			<?php
				$esimate_data_wallpaper = array(
					'15' => array( '73', '46', '64', '59', '30', '54', '86', '48', '67', '61', '31', '56'),
					'16' => array( '85', '47', '66', '61', '30', '55', '88', '49', '69', '63', '41', '57'),
					'17' => array( '87', '58', '68', '62', '51', '56', '91', '60', '70', '64', '52', '58'),
					'18' => array( '89', '59', '69', '63', '51', '57', '93', '61', '72', '66', '53', '59'),
					'19' => array( '91', '61', '71', '65', '52', '58', '96', '63', '84', '67', '53', '60'),
					'20' => array( '94', '62', '83', '66', '53', '59', '100', '64', '86', '69', '54', '61'),
					'21' => array( '106', '63', '84', '87', '53', '60', '110', '65', '88', '87', '55', '62'),
					'22' => array( '108', '64', '86', '87', '54', '61', '113', '66', '90', '89', '56', '64'),
					'23' => array( '110', '65', '88', '90', '55', '62', '115', '77', '91', '93', '56', '65'),
					'24' => array( '112', '66', '89', '91', '55', '63', '117', '79', '93', '94', '57', '66'),
					'25' => array( '114', '67', '101', '92', '56', '84', '120', '80', '105', '96', '58', '87'),
					'26' => array( '117', '78', '102', '94', '57', '85', '122', '81', '107', '97', '58', '88'),
					'27' => array( '119', '79', '104', '95', '57', '86', '135', '82', '108', '99', '59', '89'),
					'28' => array( '121', '80', '106', '96', '58', '87', '137', '83', '110', '100', '60', '90'),
					'29' => array( '123', '82', '107', '98', '59', '88', '140', '85', '112', '102', '61', '91'),
					'30' => array( '125', '83', '109', '99', '59', '89', '142', '86', '114', '103', '61', '92'),
					'31' => array( '147', '84', '111', '120', '60', '90', '154', '87', '116', '122', '62', '93'),
					'32' => array( '150', '85', '112', '121', '61', '91', '157', '96', '117', '123', '63', '94'),
					'33' => array( '152', '96', '114', '122', '79', '92', '159', '101', '119', '126', '82', '95'),
					'34' => array( '154', '97', '116', '122', '79', '93', '161', '101', '121', '126', '82', '96'),
					'35' => array( '156', '98', '117', '123', '79', '94', '164', '102', '123', '126', '82', '98'),
					'36' => array( '158', '99', '119', '127', '83', '95', '166', '103', '125', '131', '86', '99'),
					'37' => array( '161', '100', '140', '128', '84', '116', '179', '104', '146', '133', '86', '119'),
					'38' => array( '163', '101', '142', '129', '84', '117', '181', '105', '148', '134', '87', '121'),
					'39' => array( '165', '102', '144', '131', '85', '118', '184', '107', '150', '136', '88', '122'),
					'40' => array( '167', '103', '145', '132', '86', '119', '186', '108', '152', '137', '88', '123'),
					'41' => array( '185', '105', '147', '143', '86', '120', '198', '109', '154', '148', '89', '124'),
					'42' => array( '187', '106', '149', '146', '87', '121', '201', '110', '155', '151', '90', '125'),
					'43' => array( '194', '107', '150', '146', '88', '122', '203', '126', '157', '151', '91', '126'),
					'44' => array( '196', '108', '152', '147', '88', '123', '205', '130', '159', '152', '91', '127'),
					'45' => array( '198', '109', '153', '147', '89', '124', '208', '131', '171', '164', '92', '128'),
					'46' => array( '200', '110', '155', '160', '100', '125', '210', '133', '173', '166', '103', '129'),
					'47' => array( '202', '111', '157', '161', '100', '126', '213', '135', '175', '167', '104', '140'),
					'48' => array( '205', '127', '158', '162', '101', '127', '215', '138', '176', '169', '104', '142'),
					'49' => array( '207', '133', '180', '164', '112', '144', '218', '138', '188', '170', '115', '152'),
					'50' => array( '209', '134', '182', '165', '112', '149', '220', '140', '190', '172', '116', '153'),
					'51' => array( '231', '135', '183', '176', '113', '149', '242', '158', '193', '177', '116', '155'),
					'52' => array( '233', '136', '185', '176', '114', '150', '245', '158', '193', '194', '117', '156'),
					'53' => array( '235', '138', '186', '177', '114', '151', '247', '159', '195', '196', '118', '157'),
					'54' => array( '238', '139', '188', '177', '115', '152', '249', '159', '197', '197', '118', '158'),
					'55' => array( '240', '140', '190', '191', '116', '153', '252', '160', '199', '199', '119', '159'),
					'56' => array( '242', '141', '191', '193', '116', '154', '254', '161', '201', '200', '120', '160'),
					'57' => array( '244', '142', '193', '194', '117', '155', '257', '162', '202', '202', '121', '161'),
					'58' => array( '246', '143', '195', '195', '117', '156', '259', '163', '204', '203', '121', '162'),
					'59' => array( '249', '144', '196', '197', '118', '157', '262', '165', '206', '204', '122', '163'),
					'60' => array( '251', '145', '198', '198', '119', '158', '264', '166', '208', '206', '123', '164')
				);

                $esimate_data_floorpaper = array(
                    '15' => array( '30', '37', '46', '22', '26', '31', '34', '43', '53', '25', '30', '35'),
					'16' => array( '31', '39', '49', '23', '27', '32', '36', '46', '57', '26', '31', '37'),
					'17' => array( '32', '40', '50', '23', '27', '33', '38', '48', '61', '26', '32', '38' ),
					'18' => array( '34', '43', '53', '24', '29', '34', '41', '51', '64', '27', '33', '40'),
					'19' => array( '36', '45', '56', '24', '29', '35', '43', '54', '68', '28', '34', '41'),
					'20' => array( '38', '48', '59', '25', '30', '37', '45', '57', '71', '29', '35', '43'),
					'21' => array( '40', '50', '62', '25', '30', '37', '47', '60', '75', '29', '36', '44'),
					'22' => array( '41', '52', '65', '26', '32', '39', '50', '63', '78', '30', '37', '46'),
					'23' => array( '43', '55', '68', '26', '32', '40', '52', '66', '82', '31', '38', '47'),
					'24' => array( '45', '57', '71', '27', '33', '41', '54', '68', '86', '32', '40', '49'),
					'25' => array( '47', '59', '74', '27', '34', '42', '56', '71', '89', '32', '40', '50'),
					'26' => array( '49', '62', '77', '28', '35', '43', '59', '74', '93', '33', '42', '52'),
					'27' => array( '51', '64', '80', '28', '35', '44', '61', '77', '96', '34', '42', '53'),
					'28' => array( '53', '67', '83', '29', '37', '46', '63', '80', '100', '35', '44', '55'),
					'29' => array( '55', '69', '86', '30', '38', '47', '65', '83', '103', '36', '45', '57'),
					'30' => array( '56', '71', '89', '31', '39', '49', '68', '86', '107', '37', '47', '59'),
					'31' => array( '58', '74', '92', '32', '41', '51', '70', '88', '110', '38', '49', '61'),
					'32' => array( '60', '76', '95', '33', '42', '52', '72', '91', '114', '40', '50', '63'),
					'33' => array( '62', '78', '98', '34', '43', '54', '74', '94', '118', '41', '52', '65'),
					'34' => array( '64', '81', '101', '35', '44', '56', '77', '97', '121', '42', '53', '67'),
					'35' => array( '66', '83', '104', '36', '46', '57', '79', '100', '122', '43', '55', '69'),
					'36' => array( '68', '86', '107', '37', '47', '59', '81', '103', '128', '45', '56', '71'),
					'37' => array( '70', '88', '110', '38', '48', '60', '84', '105', '132', '46', '58', '73'),
					'38' => array( '71', '90', '113', '39', '50', '62', '86', '108', '135', '47', '60', '74'),
					'39' => array( '73', '93', '116', '40', '51', '64', '88', '111', '139', '48', '61', '76'),
					'40' => array( '75', '95', '119', '41', '52', '65', '90', '114', '143', '50', '63', '78'),
					'41' => array( '77', '97', '122', '42', '54', '67', '93', '117', '144', '51', '64', '80'),
					'42' => array( '79', '100', '125', '43', '55', '68', '95', '120', '147', '52', '66', '82'),
					'43' => array( '81', '102', '128', '44', '56', '68', '97', '123', '153', '53', '67', '84'),
					'44' => array( '83', '105', '131', '46', '57', '72', '99', '125', '157', '55', '69', '86'),
					'45' => array( '85', '107', '134', '47', '59', '72', '102', '128', '160', '56', '71', '88'),
					'46' => array( '87', '109', '137', '48', '60', '75', '104', '131', '164', '57', '72', '90'),
					'47' => array( '88', '112', '140', '49', '61', '75', '106', '134', '168', '58', '74', '92'),
					'48' => array( '90', '114', '143', '50', '63', '78', '108', '137', '171', '60', '75', '94'),
					'49' => array( '92', '116', '146', '51', '64', '79', '111', '140', '175', '61', '77', '96'),
					'50' => array( '94', '119', '149', '52', '65', '79', '113', '143', '178', '62', '78', '98'),
					'51' => array( '96', '121', '151', '53', '67', '82', '115', '145', '182', '63', '80', '100'),
					'52' => array( '98', '124', '154', '54', '68', '82', '117', '148', '185', '65', '82', '102'),
					'53' => array( '100', '126', '157', '55', '69', '86', '120', '151', '189', '66', '83', '104'),
					'54' => array( '102', '128', '160', '56', '71', '86', '122', '154', '192', '67', '85', '106'),
					'55' => array( '103', '131', '163', '57', '72', '90', '124', '157', '196', '68', '86', '108'),
					'56' => array( '105', '133', '166', '58', '73', '91', '126', '160', '200', '70', '88', '110'),
					'57' => array( '107', '135', '169', '59', '74', '93', '129', '163', '203', '71', '89', '112'),
					'58' => array( '109', '138', '172', '60', '76', '95', '131', '165', '207', '72', '91', '114'),
					'59' => array( '111', '140', '175', '61', '77', '96', '133', '168', '210', '73', '93', '116'),
					'60' => array( '113', '143', '178', '62', '78', '98', '135', '171', '214', '74', '94', '118')
                );

                $esimate_data_floor = array(
                    '15' => array( '116', '91', '50', '145', '120', '79', '139', '109', '59', '174', '145', '98'),
                    '16' => array( '123', '97', '53', '155', '128', '84', '148', '116', '63', '186', '154', '102'),
                    '17' => array( '131', '103', '56', '165', '137', '90', '157', '123', '67', '197', '164', '108'),
                    '18' => array( '139', '109', '59', '174', '145', '95', '166', '131', '71', '209', '173', '114'),
                    '19' => array( '146', '115', '63', '184', '153', '100', '176', '138', '75', '221', '183', '120'),
                    '20' => array( '154', '121', '66', '194', '161', '106', '185', '145', '79', '232', '193', '127'),
                    '21' => array( '162', '127', '69', '203', '169', '111', '194', '152', '83', '244', '202', '133'),
                    '22' => array( '169', '133', '73', '213', '177', '116', '203', '160', '87', '256', '212', '139'),
                    '23' => array( '177', '139', '76', '223', '185', '121', '213', '167', '91', '267', '222', '146'),
                    '24' => array( '185', '145', '79', '232', '193', '127', '222', '174', '95', '279', '231', '152'),
                    '25' => array( '193', '151', '83', '242', '201', '132', '231', '182', '99', '290', '241', '158'),
                    '26' => array( '200', '157', '86', '252', '209', '137', '240', '189', '103', '302', '251', '165'),
                    '27' => array( '208', '163', '89', '261', '217', '143', '249', '196', '107', '314', '260', '171'),
                    '28' => array( '216', '169', '92', '271', '225', '148', '259', '203', '111', '325', '270', '177'),
                    '29' => array( '223', '175', '96', '281', '233', '153', '268', '211', '115', '337', '279', '184'),
                    '30' => array( '231', '182', '99', '290', '241', '158', '277', '218', '119', '348', '289', '190'),
                    '31' => array( '239', '188', '102', '300', '249', '164', '286', '225', '123', '360', '299', '196'),
                    '32' => array( '246', '194', '106', '310', '257', '169', '296', '232', '127', '372', '308', '203'),
                    '33' => array( '254', '200', '109', '319', '265', '174', '305', '240', '131', '383', '318', '209'),
                    '34' => array( '262', '206', '112', '329', '273', '180', '314', '247', '135', '395', '328', '215'),
                    '35' => array( '270', '212', '116', '339', '281', '185', '323', '254', '139', '407', '337', '222'),
                    '36' => array( '277', '218', '119', '348', '289', '190', '333', '261', '143', '418', '347', '228'),
                    '37' => array( '285', '224', '122', '358', '297', '195', '342', '269', '147', '430', '357', '234'),
                    '38' => array( '293', '230', '125', '368', '305', '201', '351', '276', '150', '441', '366', '241'),
                    '39' => array( '300', '236', '129', '378', '313', '206', '360', '283', '154', '453', '376', '247'),
                    '40' => array( '308', '242', '132', '387', '321', '211', '370', '290', '158', '465', '385', '253'),
                    '41' => array( '316', '248', '135', '397', '329', '216', '379', '298', '162', '476', '395', '260'),
                    '42' => array( '323', '254', '139', '407', '337', '222', '388', '305', '166', '488', '405', '266'),
                    '43' => array( '331', '260', '142', '416', '345', '227', '397', '312', '170', '499', '414', '272'),
                    '44' => array( '339', '266', '145', '426', '353', '232', '407', '319', '174', '511', '424', '279'),
                    '45' => array( '347', '272', '149', '436', '361', '238', '416', '327', '178', '523', '434', '285'),
                    '46' => array( '354', '278', '152', '445', '369', '243', '425', '334', '182', '534', '443', '291'),
                    '47' => array( '362', '284', '155', '455', '377', '248', '434', '341', '186', '546', '453', '298'),
                    '48' => array( '370', '290', '158', '465', '385', '253', '444', '348', '190', '558', '463', '304'),
                    '49' => array( '377', '296', '162', '474', '393', '259', '453', '356', '194', '569', '472', '310'),
                    '50' => array( '385', '303', '165', '484', '402', '264', '462', '363', '198', '581', '482', '317'),
                    '51' => array( '393', '309', '168', '494', '410', '269', '471', '370', '202', '592', '491', '323'),
                    '52' => array( '400', '315', '172', '503', '418', '275', '480', '378', '206', '604', '501', '329'),
                    '53' => array( '408', '321', '175', '513', '426', '280', '490', '385', '210', '616', '511', '336'),
                    '54' => array( '416', '327', '178', '523', '434', '285', '499', '392', '214', '627', '520', '342'),
                    '55' => array( '424', '333', '182', '532', '442', '290', '508', '399', '218', '639', '530', '348'),
                    '56' => array( '431', '339', '185', '542', '450', '296', '517', '407', '222', '650', '540', '355'),
                    '57' => array( '439', '345', '188', '552', '458', '301', '527', '414', '226', '662', '549', '361'),
                    '58' => array( '447', '351', '191', '561', '466', '306', '536', '421', '230', '674', '559', '367'),
                    '59' => array( '454', '357', '195', '571', '474', '312', '545', '428', '234', '685', '569', '374'),
                    '60' => array( '462', '363', '198', '581', '482', '317', '554', '436', '238', '697', '578', '380')
                );
			?>


			<script>
				function reset_estimate()
				{
					$( "#estimate-wallpaper-form .estimate-select ul li:first" ).click();
					$( "#estimate-wallpaper-form .estimate-radio input:first" ).click();
					$( "#estimate-wallpaper-form .information input[type=text]" ).val("");
				}
				$(function(){

					$('#estimate-wallpaper-form [name=option-pyeong], #estimate-wallpaper-form .estimate-radio input').blur(function(){

						_p = $('#estimate-wallpaper-form [name=option-pyeong]').val();
                        //console.log(_p);
						if( _p == "" ) {

							$( '#estimate-wallpaper-form .estimate-price:eq(0)' ).text("??");
							$( '#estimate-wallpaper-form .estimate-price:eq(1)' ).text("??");
							$( '#estimate-wallpaper-form .estimate-price:eq(2)' ).text("??");
							$( '#estimate-wallpaper-form .estimate-price:eq(3)' ).text("??");
							return ;
						}
						_o = $('#estimate-wallpaper-form select option[value='+_p+']' );

						_p_idx = [];

						if( $( "#estimate-wallpaper-form [name=w-veranda]:checked" ).val() == "없음" ) {

							( $( "#estimate-wallpaper-form [name=w-ceiling]:checked" ).val() == "포함" ) ?  _p_idx = [0,1,2] : _p_idx = [3,4,5];

						}else{

							( $( "#estimate-wallpaper-form [name=w-ceiling]:checked" ).val() == "포함" ) ? _p_idx = [6,7,8] :_p_idx = [9,10,11];

						}

						_idx = $( "#estimate-wallpaper-form [name=w-papering]input" ).index( $( "#estimate-wallpaper-form [name=w-papering]input:checked" ) );

						_prices = _o.data( 'prices' );
						$( '#estimate-wallpaper-form .estimate-price:eq(0)' ).text(_prices[_p_idx[0]]);
						$( '#estimate-wallpaper-form .estimate-price:eq(1)' ).text(_prices[_p_idx[1]]);
						$( '#estimate-wallpaper-form .estimate-price:eq(2)' ).text(_prices[_p_idx[2]]);
						$( '#estimate-wallpaper-form .estimate-price:eq(3)' ).text(_prices[_p_idx[_idx]]);

						//alert($(this).val());
					});


                    $('#estimate-floorpaper-form [name=option-pyeong], #estimate-floorpaper-form .estimate-radio input').blur(function(){

						_p = $('#estimate-floorpaper-form [name=option-pyeong]').val();

						if( _p == "" ) {

							$( '#estimate-floorpaper-form .estimate-price:eq(0)' ).text("??");
							$( '#estimate-floorpaper-form .estimate-price:eq(1)' ).text("??");
							$( '#estimate-floorpaper-form .estimate-price:eq(2)' ).text("??");
							$( '#estimate-floorpaper-form .estimate-price:eq(3)' ).text("??");
                            // $( '#estimate-floorpaper-form .estimate-price:eq(4)' ).text("??");
							return ;
						}
						_o = $('#estimate-floorpaper-form select option[value='+_p+']' );

						_p_idx = [];

						if( $( "#estimate-floorpaper-form [name=p-veranda]:checked" ).val() == "없음" ) {

							( $( "#estimate-floorpaper-form [name=p-all]:checked" ).val() == "집 전체 포함" ) ?  _p_idx = [0,1,2] : _p_idx = [3,4,5];

						}else{

							( $( "#estimate-floorpaper-form [name=p-all]:checked" ).val() == "집 전체 포함" ) ? _p_idx = [6,7,8] :_p_idx = [9,10,11];

						}

						_idx = $( "#estimate-floorpaper-form [name=p-floorpaper]input" ).index( $( "#estimate-floorpaper-form [name=p-floorpaper]input:checked" ) );

						console.log( _p_idx );
						_prices = _o.data( 'prices' );
						$( '#estimate-floorpaper-form .estimate-price:eq(0)' ).text(_prices[_p_idx[0]]);
						$( '#estimate-floorpaper-form .estimate-price:eq(1)' ).text(_prices[_p_idx[1]]);
						$( '#estimate-floorpaper-form .estimate-price:eq(2)' ).text(_prices[_p_idx[2]]);

                        if($( "#estimate-floorpaper-form .consulting input").is(":checked")){

                            $( '#estimate-floorpaper-form .estimate-price:eq(3)' ).text('상담필요');

                        } else {

                            $( '#estimate-floorpaper-form .estimate-price:eq(3)' ).text(_prices[_p_idx[_idx]]);
                        }

					});


                    $('#estimate-floor-form [name=option-pyeong], #estimate-floor-form .estimate-radio input').blur(function(){

                        _p = $('#estimate-floor-form [name=option-pyeong]').val();
						if( _p == "" ) {

							$( '#estimate-floor-form .estimate-price:eq(0)' ).text("??");
							$( '#estimate-floor-form .estimate-price:eq(1)' ).text("??");
							$( '#estimate-floor-form .estimate-price:eq(2)' ).text("??");
							$( '#estimate-floor-form .estimate-price:eq(3)' ).text("??");
                            // $( '#estimate-floorpaper-form .estimate-price:eq(4)' ).text("??");
							return ;
						}
						_o = $('#estimate-floor-form select option[value='+_p+']' );

						_p_idx = [];

						if( $( "#estimate-floor-form [name=f-veranda]:checked" ).val() == "없음" ) {

							( $( "#estimate-floor-form [name=f-existing]:checked" ).val() == "기존바닥재 없음/장판" ) ?  _p_idx = [0,1,2] : _p_idx = [3,4,5];

						}else{

							( $( "#estimate-floor-form [name=f-existing]:checked" ).val() == "기존바닥재 없음/장판" ) ? _p_idx = [6,7,8] :_p_idx = [9,10,11];

						}

						_idx = $( "#estimate-floor-form [name=f-floor]input" ).index( $( "#estimate-floor-form [name=f-floor]input:checked" ) );

						_prices = _o.data( 'prices' );
						$( '#estimate-floor-form .estimate-price:eq(0)' ).text(_prices[_p_idx[0]]);
						$( '#estimate-floor-form .estimate-price:eq(1)' ).text(_prices[_p_idx[1]]);
						$( '#estimate-floor-form .estimate-price:eq(2)' ).text(_prices[_p_idx[2]]);

                        if($( "#estimate-floor-form .consulting input").is(":checked")){

                            $( '#estimate-floor-form .estimate-price:eq(3)' ).text('상담필요');

                        } else {

                            $( '#estimate-floor-form .estimate-price:eq(3)' ).text(_prices[_p_idx[_idx]]);
                        }

					});

				});
			</script>
			<form id="estimate-wallpaper-form" action="/wallpaper/update_estimate.php" method="post" onsubmit="return simple_ajax_submit( this, function(rt){ if( rt.result == 'success' ){ alert( '요청되었습니다.' ); reset_estimate(); } } );">
			<input type="hidden" name="type" value="도배"/>

            <div class="estimate-group">
                <div class="w-12-4 fl">
                    <div class="im-x-2">
                        <div class="title">집 전체 면적</div>

                        <div class="estimate-select white w-12-6 fl" data-name="option-area">


                        	<div class="label"><span>해당지역 <i class="fa fa-angle-down" aria-hidden="true"></i></span></div>
                        	<ul><input type="hidden" name="option-area" value="" class="submit-required" data-label="해당지역"/></ul>
                        	<select>
                        		<option value="">해당지역</option>
                        		<option value="옵션 A">옵션 A</option>
                        		<option value="옵션 B">옵션 B</option>
                        		<option value="옵션 C">옵션 C</option>
                        	</select>

                        </div>

                        <div class="estimate-select w-12-6 fr" data-name="option-pyeong">

                        	<div class="label"><span>공급면적 (평) <i class="fa fa-angle-down" aria-hidden="true"></i></span></div>
                        	<ul><input type="hidden" name="option-pyeong" value="" class="submit-required" data-label="공급면적" /></ul>
                        	<select>
                        		<option value="">공급면적 (평)</option>
                        		<?php foreach( $esimate_data_wallpaper as $k => $v ){ ?>
                        		<option value="<?php echo $k;?>평" data-prices='<?php echo json_encode( $v );?>'><?php echo $k;?>평</option>
                        		<?php }?>
                        	</select>
                        </div>
                        <div class="clear"> </div>
                    </div>

                    <div class="im-x-2">
                        <div class="title">현장 조건</div>

                        <div class="estimate-radio">
                        	<label class="w-12-6 fl"><span>배란다 확장 없음</span><input type="radio" name="w-veranda" value="없음"/></label>
                        	<label class="w-12-6 fl"><span>배란다 확장 있음</span><input type="radio" name="w-veranda" value="있음"/></label>
							<div class="clear"></div>
                        </div>

                        <div class="estimate-radio">
                        	<label class="w-12-6 fl"><span>천장시공 포함</span><input type="radio" name="w-ceiling" value="포함" checked="checked"/></label>
                        	<label class="w-12-6 fl"><span>천장시공 미포함</span><input type="radio" name="w-ceiling" value="미포함"/></label>
							<div class="clear"></div>
                        </div>

                        <div class="estimate-radio">
                        	<label class="w-12-6 fl"><span>거주중/가구있음</span><input type="radio" name="w-stay" value="거주중/가구있음"/></label>
                        	<label class="w-12-6 fl"><span>빈집/가구없음</span><input type="radio" name="w-stay" value="빈집/가구없음"/></label>
							<div class="clear"></div>
                        </div>

                        <div class="clear"></div>
                    </div>
                </div>


				<div class="w-12-4 fl">
                    <div class="im-x-2">
                        <div class="title">벽지 종류</div>

                        <div class="estimate-radio">
                        	<label class="w-12-6 fl"><span>실크도배</span><input type="radio" name="w-papering" value="실크도배"/></label>
                        	<label class="w-12-6 fl"><span><b class="estimate-price">24</b> 만원</span></label>
							<div class="clear"></div>
                        	<label class="w-12-6 fl"><span>합지도배</span><input type="radio" name="w-papering" value="합지도배"/></label>
                        	<label class="w-12-6 fl"><span><b class="estimate-price">43</b> 만원</span></label>
							<div class="clear"></div>
                        	<label class="w-12-6 fl"><span style="line-height:20px">거실벽 실크+<br/>천장 및 방합지</span><input type="radio" name="w-papering" value="합지도배"/></label>
                        	<label class="w-12-6 fl"><span><b class="estimate-price">74</b> 만원</span></label>
							<div class="clear"></div>
                        </div>

						<div class="clear"></div>

	                    <ul class="add-explain">
	                        <li><i class="fal fa-question-circle"></i> <a>실크 VS 합지 차이가 궁금하세요?</a> </li>
	                        <li><i class="fal fa-check-circle"></i> <a>울 화이트 패키지</a> <!--<img src="/assets/images/main/sale_icon.png" />--> </li>
	                    </ul>
                    </div>


                </div>

                <div class="information w-12-4 fl">
                    <div class="im-x-2">
                        <ul>
                            <li>고객 정보</li>
                            <li><label>이름</label><input type="text" name="name" placeholder="홍길동" class="submit-required" data-label="고객정보 이름"/></li>
                            <li><label>연락처</label><input type="text" name="tel" placeholder="010-6000-0000" class="submit-required" data-label="고객정보 연락처"/></li>
                            <li><label>시공날짜</label><input type="text" name="c-date" placeholder="2018.02.20" class="datepicker"/></li>
                            <li>
                            	<label>총 견적</label>
                            	<div>
                            		<span><b class="estimate-price">24</b>만원</span>
                            	</div>
                            </li>
                        </ul>

                        <label class="estimate-check fa-radio"><i class="fal fa-check-circle"></i> 정보수집에 동의 <input type="checkbox" name="mach" value="풀기계 있음" class="submit-required" data-label="정보수집 동의"></label>
                    </div>
                    <div class="consulting-div">
                        <button>선택한 조건으로 상담신청하기 ></button>
                    </div>
                </div>

                <div class="clear"></div>
            </div>
		</form>

		<form id="estimate-floorpaper-form" action="/wallpaper/update_estimate.php" method="post" onsubmit="return simple_ajax_submit( this, function(rt){ if( rt.result == 'success' ){ alert( '요청되었습니다.' ); } } );">

		<input type="hidden" name="type" value="장판"/>
			<div class="estimate-group">
                <div class="w-12-4 fl">
                    <div class="im-x-2">
                        <div class="title">집 전체 면적</div>
                        <div class="estimate-select white w-12-6 fl" data-name="option-area">
							<div class="label"><span>해당지역 <i class="fa fa-angle-down" aria-hidden="true"></i></span></div>
                            <ul>
                                <input type="hidden" name="option-area" value="" />
                        	</ul>
							<select>
                                <option value="">해당지역</option>
                                <option value="1">옵션1</option>
                                <option value="2">옵션2</option>
                                <option value="3">옵션3</option>
                                <option value="4">옵션4</option>
                                <option value="5">옵션5</option>
                            </select>
                        </div>
                        <div class="estimate-select w-12-6 fr" data-name="option-pyeong">

                        	<div class="label"><span>공급면적 (평) <i class="fa fa-angle-down" aria-hidden="true"></i></span></div>
                        	<ul><input type="hidden" name="option-pyeong" value="" class="submit-required" data-label="공급면적" /></ul>
                        	<select>
                        		<option value="">공급면적 (평)</option>
                        		<?php foreach( $esimate_data_floorpaper as $k => $v ){ ?>
                        		<option value="<?php echo $k;?>평" data-prices='<?php echo json_encode( $v );?>'><?php echo $k;?>평</option>
                        		<?php }?>
                        	</select>
                        </div>
                        <div class="clear"> </div>
                    </div>

                    <div class="im-x-2">
                        <div class="title">현장 조건</div>

						<div class="estimate-radio">
                            <label class="w-12-6 fl"><span>배란다 확장 없음</span><input type="radio" name="p-veranda" value="없음"/></label>
                        	<label class="w-12-6 fl"><span>배란다 확장 있음</span><input type="radio" name="p-veranda" value="있음"/></label>
							<div class="clear"></div>
                        </div>

						<div class="estimate-radio">
                        	<label class="w-12-6 fl"><span>집 전체 포함</span><input type="radio" name="p-all" value="집 전체 포함"/></label>
                        	<label class="w-12-6 fl"><span>방 만 시공</span><input type="radio" name="p-all" value="방 만 시공"/></label>
							<div class="clear"></div>
                        </div>

						<div class="estimate-radio">
                        	<label class="w-12-6 fl"><span>거주중/가구있음</span><input type="radio" name="p-stay" value="거주중/가구있음"/></label>
                        	<label class="w-12-6 fl"><span>빈집/가구 없음</span><input type="radio" name="p-stay" value="빈집/가구 없음"/></label>
							<div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>


				<div class="w-12-4 fl">
                    <div class="im-x-2">
                        <div class="title">장판 종류</div>

						 <div class="estimate-radio">
                        	<label class="w-12-6 fl"><span>장판 두께 1.8MM</span><input type="radio" name="p-floorpaper" value="장판 두께 1.8MM"/></label>
                        	<label class="w-12-6 fl"><span><b class="estimate-price">24</b> 만원</span></label>
							<div class="clear"></div>
                        	<label class="w-12-6 fl"><span>장판 두께 2.0MM</span><input type="radio" name="p-floorpaper" value="장판 두께 2.0MM"/></label>
                        	<label class="w-12-6 fl"><span><b class="estimate-price">43</b> 만원</span></label>
							<div class="clear"></div>
							<label class="w-12-6 fl"><span>장판 두께 2.3MM</span><input type="radio" name="p-floorpaper" value="장판 두께 2.3MM"/></label>
                        	<label class="w-12-6 fl"><span><b class="estimate-price">74</b> 만원</span></label>
							<div class="clear"></div>
							<label class="w-12-6 fl consulting"><span>더 두꺼운 장판</span><input type="radio" name="p-floorpaper" value="더 두꺼운 장판"/></label>
                        	<label class="w-12-6 fl"><span><b>상담필요</b></span></label>
							<div class="clear"></div>
                        </div>
						<div class="clear"></div>

	                    <ul class="add-explain">
	                        <li><i class="fal fa-question-circle"></i> <a>장판 두께의 차이가 궁금하세요?</a> </li>
	                        <li><i class="fal fa-check-circle"></i> <a>장판 패키지(상담 필요)</a> </li>
	                    </ul>
                    </div>

                </div>

                <div class="information w-12-4 fl">
                    <div class="im-x-2">
                        <ul class="imb-10">
                            <li>고객 정보</li>
                            <li><label>이름</label><input type="text" name="name" placeholder="홍길동" class="submit-required" data-label="고객정보 이름"/></li>
                            <li><label>연락처</label><input type="text" name="tel" placeholder="010-6000-0000" class="submit-required" data-label="고객정보 연락처"/></li>
                            <li><label>시공날짜</label><input type="text" name="c-date" placeholder="2018.02.20" class="datepicker"/></li>
                            <li>
                            	<label>총 견적</label>
                            	<div>
                            		<span><b class="estimate-price">24</b>만원</span>
                            	</div>
                            </li>
                        </ul>
                        <label class="estimate-check fa-radio"><i class="fal fa-check-circle"></i> 정보수집에 동의 <input type="checkbox" name="mach" value="풀기계 있음" class="submit-required" data-label="정보수집 동의"></label>
                    </div>
                    <div class="consulting-div">
                        <button>선택한 조건으로 상담신청하기 ></button>
                    </div>
                </div>

                <div class="clear"></div>

            </div>
		</form>

			<form id="estimate-floor-form" action="./?p=estimate-update" method="post" onsubmit="return simple_ajax_submit( this, function(rt){ if( rt.result == 'success' ){ alert( '요청되었습니다.' ); } } );">
			<input type="hidden" name="type" value="마루"/>

			<div class="estimate-group">
                <div class="w-12-4 fl">
                    <div class="im-x-2">
                        <div class="title">집 전체 면적</div>
                        <div class="estimate-select white w-12-6 fl" data-name="option-area">
							<div class="label"><span>해당지역 <i class="fa fa-angle-down" aria-hidden="true"></i></span></div>
                            <ul>
                                <input type="hidden" name="option-area" value="" />
                        	</ul>
                            <select>
                                <option value="">해당지역</option>
                                <option value="1">옵션1</option>
                                <option value="2">옵션2</option>
                                <option value="3">옵션3</option>
                                <option value="4">옵션4</option>
                                <option value="5">옵션5</option>
                            </select>
                        </div>
                        <div class="estimate-select w-12-6 fr" data-name="option-pyeong">

                        	<div class="label"><span>공급면적 (평) <i class="fa fa-angle-down" aria-hidden="true"></i></span></div>
                        	<ul><input type="hidden" name="option-pyeong" value="" class="submit-required" data-label="공급면적" /></ul>
                        	<select>
                        		<option value="">공급면적 (평)</option>
                        		<?php foreach( $esimate_data_floor as $k => $v ){ ?>
                        		<option value="<?php echo $k;?>평" data-prices='<?php echo json_encode( $v );?>'><?php echo $k;?>평</option>
                        		<?php }?>
                        	</select>
                        </div>
                        <div class="clear"> </div>
                    </div>

                    <div class="im-x-2">
                        <div class="title">현장 조건</div>

						<div class="estimate-radio">
                            <label class="w-12-6 fl"><span>배란다 확장 없음</span><input type="radio" name="f-veranda" value="없음"/></label>
                        	<label class="w-12-6 fl"><span>배란다 확장 있음</span><input type="radio" name="f-veranda" value="있음"/></label>
							<div class="clear"></div>
                        </div>

						<div class="estimate-radio">
                        	<label class="w-12-6 fl"><span style="line-height:1.45">기존바닥재<br />없음/장판</span><input type="radio" name="f-existing" value="기존바닥재 없음/장판"/></label>
                        	<label class="w-12-6 fl"><span style="line-height:1.45">기존바닥재<br />마루/대리석</span><input type="radio" name="f-existing" value="기존바닥재 마루/대리석"/></label>
							<div class="clear"></div>
                        </div>

						<div class="estimate-radio">
                        	<label class="w-12-6 fl"><span>거주중/가구있음</span><input type="radio" name="f-stay" value="거주중/가구있음"/></label>
                        	<label class="w-12-6 fl"><span>빈집/가구 없음</span><input type="radio" name="f-stay" value="빈집/가구 없음"/></label>
							<div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>


				<div class="w-12-4 fl">
                    <div class="im-x-2">
                        <div class="title">마루 종류</div>

						<div class="estimate-radio">
						   <label class="w-12-6 fl"><span>강마루</span><input type="radio" name="f-floor" value="강마루"/></label>
						   <label class="w-12-6 fl"><span><b class="estimate-price">24</b> 만원</span></label>
						   <div class="clear"></div>
						   <label class="w-12-6 fl"><span>강화마루</span><input type="radio" name="f-floor" value="강화마루"/></label>
						   <label class="w-12-6 fl"><span><b class="estimate-price">43</b> 만원</span></label>
						   <div class="clear"></div>
						   <label class="w-12-6 fl"><span>데코타일</span><input type="radio" name="f-floor" value="데코타일"/></label>
						   <label class="w-12-6 fl"><span><b class="estimate-price">74</b> 만원</span></label>
						   <div class="clear"></div>
						   <label class="w-12-6 fl consulting"><span>원목마루</span><input type="radio" name="f-floor" value="원목마루"/></label>
						   <label class="w-12-6 fl"><span><b>상담필요</b></span></label>
						   <div class="clear"></div>
					   </div>
					   <div class="clear"></div>

	                   <ul class="add-explain">
							<li><i class="fal fa-question-circle"></i> <a>마루 종류의 차이가 궁금하세요?</a> </li>
							<li><i class="fal fa-check-circle"></i> <a>해링본패턴 시공</a> </li>
	                   </ul>
				   </div>

                </div>

                <div class="information w-12-4 fl">
                    <div class="im-x-2">
                        <ul class="imb-10">
                            <li>고객 정보</li>
                            <li><label>이름</label><input type="text" name="name" placeholder="홍길동" class="submit-required" data-label="고객정보 이름"/></li>
                            <li><label>연락처</label><input type="text" name="tel" placeholder="010-6000-0000" class="submit-required" data-label="고객정보 연락처"/></li>
                            <li><label>시공날짜</label><input type="text" name="c-date"placeholder="2018.02.20" class="datepicker"/></li>
                            <li>
                            	<label>총 견적</label>
                            	<div>
                            		<span><b class="estimate-price">24</b>만원</span>
                            	</div>
                            </li>
                        </ul>
                        <label class="estimate-check fa-radio"><i class="fal fa-check-circle"></i> 정보수집에 동의 <input type="checkbox" name="mach" value="풀기계 있음" class="submit-required" data-label="정보수집 동의"></label>
                    </div>
                    <div class="consulting-div">
                        <button type="submit">선택한 조건으로 상담신청하기 ></button>
                    </div>
                </div>

                <div class="clear"></div>
            </div>
			</form>

    </div>
</div>


<style>
</style>


<div id="section-tip" class="section" style="display:none;">
	<div class="row">
			<div class="section-title">
				견적 TIP
			</div>
			<div class="img-div">
				<div class="w_2_1 fl">
					<div class="im-x">
						<img src="/assets/images/main/tip01.jpg"/>
					</div>
				</div>
				<div class="w_2_1 fl" >
					<div class="im-x">
						<img src="/assets/images/main/tip02.jpg"/>
					</div>
				</div>
				<div class="clear"></div>
			</div>
	</div>
</div>

<style>
#section-construction img{ width:90%; margin: 0 auto; }
#section-construction .w-12-4{ position:relative;}
#section-construction .contents { position:absolute; top:50%; width:100%; text-align: center; margin-top: -45px; ;}
#section-construction .count{ font-size: 4em; line-height: 80px; color: #ff9932; }
.mobile #section-construction .count{ font-size: 3em; }
#section-construction .title{color: #444444; }

.mobile #section-construction .w-12-4{ width: 50%;  }
.mobile #section-construction .w-12-4.last{ float:none; margin:0 auto; clear:both; }
</style>

<script>
$(function(){ $('.count').counterUp({ delay: 10,  time: 2000 }); });
</script>

<div id="section-construction" class="section">
	<div class="row">
		<div class="im-x">
			<div class="section-title">
				온라인 인테리어 시공의 기준
			</div>

			<div class="w-12-4 fl">
				<img src='/assets/images/main/numbers-bg.png'/>
				<div class="circle">
					<div class="contents">
						<div class="count">245</div>
						<div class="title">오늘의 견적 발행 수</div>
					</div>
				</div>
			</div>
			<div class="w-12-4 fl">

				<img src='/assets/images/main/numbers-bg.png'/>
				<div class="contents">
					<div class="count">149,749</div>
					<div class="title">누적 견적 발행수</div>
				</div>
			</div>
			<div class="w-12-4 fl last">

				<img src='/assets/images/main/numbers-bg.png'/>
				<div class="contents">
					<div class="count">14,331</div>
					<div class="title">함께하는 장인들</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>

<style>
	#section-works{ background: url(/assets/images/motif/patter-gray-bias.png); }
	#section-works .texts { padding:10px 0px; line-height: 1.6; }
	#section-works .texts .title{ font-size:1.3em; }
	#section-works .texts .date{ font-size:0.8em; color: #444; }
	#section-works .texts .detail{ margin-top:20px; font-size:0.9em; padding-bottom:70px; }
	
	#section-works .chips{ position: absolute;right:10px ;bottom:10px; font-size: 0.8em; }
	#section-works .chips .fl{ margin-left:5px; }
</style>

<div id="section-works" class="section">
	<div class="section-title">
		최근 실적 현황
	</div>

	<div class="row" >
	
		<div class="im-x" style="background:#fff">
				
			<div style="border:1px solid #999;position:relative;">
				<div class="fl w-12-8">
					<img src="/assets/images/main/p-slider01.jpg"/>
				</div>
				<div class="fl w-12-4 texts" >
					<div class="im-x">
					
						<div class="title">가락동 빌라 15평 도배 시공</div>
						<div class="date">2017-12-26</div>
						
						<div class="detail">
							집이 좁다면 무조건 화이트를 해야한다? 집이 넓지 않아도 선택할 수 있는 대안은 많습니다.
							가락동의 빌라에 사용된 블루 빛깔의 스트라이프 벽지도 마찬가지였는데요.
							그레이 빛깔의 톤다운 된 색상이었지만, 우려하시던 칙칙함은 느낄 수 없었답니다.
						</div>
						
					</div>
				</div>
				
				<div class="chips">
					<div class="fl">
						<img src="/assets/images/main/p-color-01.jpg"/>
						<div class="title">ED80291</div>
					</div>
					<div class="fl">
						<img src="/assets/images/main/p-color-01.jpg"/>
						<div class="title">ED80291</div>
					</div>
					<div class="fl">
						<img src="/assets/images/main/p-color-01.jpg"/>
						<div class="title">ED80291</div>
					</div>
				</div>
				<div class="clear"></div>	
			</div>
			
			
		</div>
		
		<div id="section-works-items" style="margin-top:10px;">
			<div class="work fl w-12-3"><div class="im-x"><img src="/assets/images/main/p-slider01.jpg"/></div></div>
			<div class="work fl w-12-3"><div class="im-x"><img src="/assets/images/main/p-slider01.jpg"/></div></div>
			<div class="work fl w-12-3"><div class="im-x"><img src="/assets/images/main/p-slider01.jpg"/></div></div>
			<div class="work fl w-12-3"><div class="im-x"><img src="/assets/images/main/p-slider01.jpg"/></div></div>
			<div class="clear"></div>	
		</div>
			
		
	</div>
	
	<div>
		
	</div>
</div>

<style>
#section-performance { background: url(/assets/images/motif/patter-gray-bias.png); }

/* background-image: url("/assets/images/main/performance-bg.jpg"); background-size: cover;background-position: center; background-repeat: no-repeat; */

#section-performance .contents-div .main-ul {padding-right: 200px;}
#section-performance .contents-div .sub-ul { position:absolute; right:0px; width:200px;}
#section-performance .contents-div .sub-ul li{margin-bottom:12px;}

#section-performance .explain {background:#fff; padding:10px;}
#section-performance .title-div{border-right: 1px solid #7f7f7f; margin-right:10px;}
#section-performance .title-div .title{font-size:1.2em;line-height:19px;}
#section-performance .date{color:#7f7f7f}
#section-performance .review{color:#7f7f7f; line-height: 19px;margin-bottom: 10px;}
#section-performance .material-div .title{color:#5d5d5d}
.ipl-10{padding-left: 10px;}
</style>
<div id="section-performance" class="section">
	<div class="row">
		<div class="im-x">
			<div class="contents-div">
				<ul class="main-ul fl">
					<li><img src="/assets/images/main/p-slider01.jpg"/></li>
					<li class="explain">
						<div class="fl w_5_1">
							<div class="title-div">
								<div class="title">가락동 빌라 15평 도배 시공</div>
								<div class="date">2017-12-26</div>
							</div>
						</div>

						<div class="w_5_4 fl">
							<div class="review">
								집이 좁다면 무조건 화이트를 해야한다? 집이 넓지 않아도 선택할 수 있는 대안은 많습니다.
								가락동의 빌라에 사용된 블루 빛깔의 스트라이프 벽지도 마찬가지였는데요.
								그레이 빛깔의 톤다운 된 색상이었지만, 우려하시던 칙칙함은 느낄 수 없었답니다.
							</div>
							<div class="fr material-div">
								<div class="fl ipl-10">
									<img src="/assets/images/main/p-color-01.jpg"/>
									<div class="title">ED80291</div>
								</div>
								<div class="fl ipl-10">
									<img src="/assets/images/main/p-color-02.jpg"/>
									<div class="title">ED80291</div>
								</div>
								<div class="fl ipl-10">
									<img src="/assets/images/main/p-color-03.jpg"/>
									<div class="title">ED80291</div>
								</div>
							</div>
						</div>
						<div class="clear"></div>
					</li>
				</ul>
				<ul class="sub-ul fl">
					<li class="im-x"><img src="/assets/images/main/p-slider01.jpg"/></li>
					<li class="im-x"><img src="/assets/images/main/p-slider01.jpg"/></li>
					<li class="im-x"><img src="/assets/images/main/p-slider01.jpg"/></li>
					<li class="im-x"><img src="/assets/images/main/p-slider01.jpg"/></li>
				</ul>

				<div class="clear">

				</div>
			</div>

		</div>
	</div>
</div>

<style>
#section-miracle .background_slow{background-image: url(/assets/images/main/miracle-bg.jpg)}
#section-miracle .contents{max-width: 400px; margin: 0 auto;background: url(/assets/images/main/white-bg.png); background-size: cover;background-position: center;}
#section-miracle .contents-div{padding: 50px 20px}
#section-miracle .under-line img{margin:0 auto;}
#section-miracle .primary{font-size: 1.8em;}
#section-miracle .secondary{font-weight:700;font-size:2em;}
</style>

<div id="section-miracle" class="section background_slow_wrapper wrapper">
	<div class="background_slow_body">
		<div class="row_narrow">
			<div class="im-x">
				<div class="contents">
					<div class="contents-div">
						<div class="under-line"><img src="/assets/images/main/underline.png"/></div>
						<div class="primary">하루의 기적, 놀라지 마세요.</div>
						<div class="secondary">장인들과 함께라면 가능합니다!</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="background_slow"></div>
	<div class="clear"> </div>
</div>


<style>
#section-story img{margin:0 auto; width: 100%;}
#section-story .story-item{ margin-bottom:20px; }

#section-story .contents-div{background: #fff; position: absolute; bottom: 0;} /* opacity: 0.98;  */
#section-story .contents-div .contents-inner{padding: 10px;}
#section-story .contents-div .contents-inner .underline{border-bottom: 1px solid black;}
#section-story .contents-div .contents-inner .underline .category {color: #ff8d20; font-weight:700; ;} /* font-size:1.3em */
#section-story .contents-div .contents-inner .underline .more{color:#bdbdbd; line-height: 33px;}
#section-story .contents-div .contents-inner .title{font-weight: 600; font-size: 1.2em;}
#section-story .contents-div .contents-inner .description{line-height: 1.5em;}

</style>

<div id="section-story" class="section">
	<div class="row">

		<div class="section-title">장인들 이야기</div>
		<div class="w-12-3 fl story-item">
			<div class="im-x">
				<img src="/assets/images/main/story-01.jpg"/>

				<div class="contents-div">
					<div class="contents-inner">
						<div class="underline">
							<div class="category fl">INTERIOR TIP</div>
							<div class="more fr"><a>more ></a></div>
							<div class="clear"></div>
						</div>
						<div class="title">디테일이 다른 가구</div>
						<div class="description">요즘 떠오르는 신진 디자이너의 가구와 인테리어 활용 방법을 상세히 알려드립니다.</div>
					</div>
				</div>
			</div>
		</div>
		<div class="w-12-3 fl story-item">
			<div class="im-x">
				<img src="/assets/images/main/story-02.jpg"/>
				<div class="contents-div">
					<div class="contents-inner">
						<div class="underline">
							<div class="category fl">INTERIOR TIP</div>
							<div class="more fr"><a>more ></a></div>
							<div class="clear"></div>
						</div>
						<div class="title">디테일이 다른 가구</div>
						<div class="description">요즘 떠오르는 신진 디자이너의 가구와 인테리어 활용 방법을 상세히 알려드립니다.</div>
					</div>
				</div>
			</div>
		</div>
		<div class="w-12-3 fl story-item">
			<div class="im-x">
				<img src="/assets/images/main/story-03.jpg"/>
				<div class="contents-div">
					<div class="contents-inner">
						<div class="underline">
							<div class="category fl">INTERIOR TIP</div>
							<div class="more fr"><a>more ></a></div>
							<div class="clear"></div>
						</div>
						<div class="title">디테일이 다른 가구</div>
						<div class="description">요즘 떠오르는 신진 디자이너의 가구와 인테리어 활용 방법을 상세히 알려드립니다.</div>
					</div>
				</div>
			</div>
		</div>
		<div class="w-12-3 fl story-item">
			<div class="im-x">
				<img src="/assets/images/main/story-02.jpg"/>
				<div class="contents-div">
					<div class="contents-inner">
						<div class="underline">
							<div class="category fl">INTERIOR TIP</div>
							<div class="more fr"><a>more ></a></div>
							<div class="clear"></div>
						</div>
						<div class="title">디테일이 다른 가구</div>
						<div class="description">요즘 떠오르는 신진 디자이너의 가구와 인테리어 활용 방법을 상세히 알려드립니다.</div>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"> </div>
	</div>
</div>
