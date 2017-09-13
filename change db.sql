ALTER TABLE `posts`
	ADD COLUMN `content_lang_en` TEXT NULL AFTER `content`;

update posts
set content_lang_en = content
where content_lang_en is null;

ALTER TABLE `posts`
	ADD COLUMN `lang_id` CHAR(5) NULL AFTER `list_order`;

update navigators
set href = concat('content',SUBSTR(href, 4))
where href like '%cms/page_new%';

update navigators
set href = concat('content',SUBSTR(href, 4))
where href like '%cms/post_new%' or href like '%view_post%';

update navigators
set href = concat('content',SUBSTR(href, 4))
where href like '%category_view%';

update navigators
set href = concat('content',SUBSTR(href, 4))
WHERE href like '%faq%';

update navigators
set href = concat(substr(href, 1, 8), 'post_faq')
WHERE href like '%faq%';

