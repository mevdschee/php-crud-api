SELECT p.id, p.content, c.name 
FROM posts p
INNER JOIN categories c ON c.id = p.category_id
WHERE p.id = <?= $id ?>