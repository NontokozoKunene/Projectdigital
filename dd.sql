SELECT P.name, B.name, S.quantity
FROM Sales S
JOIN Pubs P ON S.id = P.id
JOIN beer_names B ON S.id = B.id
ORDER BY P.name, B.name;