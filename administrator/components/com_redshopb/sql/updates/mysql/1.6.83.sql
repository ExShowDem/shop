INSERT INTO `#__redshopb_template` (`id`, `name`, `alias`, `template_group`, `scope`, `content`, `state`, `default`, `checked_out`, `checked_out_time`, `created_by`, `created_date`, `modified_by`, `modified_date`, `params`) VALUES
	(null, 'Activation Email', 'activation-email', 'email', 'email', '<h1>Hi there</h1><p>Thanks for your register.</p><p>Please click this link to active your account. <a href="{activationLink}" target="_blank">Active link</a></p>', 1, 0, NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', '{"0":{"mail_subject":"Activation Email"}}');