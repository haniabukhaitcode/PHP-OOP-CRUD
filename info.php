<?php
"SELECT DISTINCT
books.id,
tags.tag,
books_tags.tag_id tag_id,
books_tags.book_id book_id,
books.author_id,
authors.author author,
books.title,
books.book_image,
-- ORDER BY v ASC
-- SEPARATOR ';')
GROUP_CONCAT(tags.tag SEPARATOR ',') tag,
GROUP_CONCAT(tags.id SEPARATOR ',') tagID
FROM
books
JOIN
authors
ON
authors.id = books.author_id

JOIN
books_tags
ON
books_tags.book_id = books.id
JOIN
tags
ON
tags.id = books_tags.tag_id

GROUP BY
books.id";
