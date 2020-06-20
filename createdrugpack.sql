create table drugpack
	(
		product_ndc_with_dashes	varchar(10) not null,
		ndc_package_code_with_dashes	varchar(13) not null,
		package_description	varchar(700) not null,
		date_approved	date not null,
		date_withdrawn	date null,
		ndc_exclude_flag enum('Yes', 'No', 'Expired', 'Inactive'),
		sample_package	enum('Yes', 'No'),
		full_ndc	varchar(11) not null,
		labeler_code	varchar(5) not null,
		primary key (full_ndc)
		) engine=InnoDB;
