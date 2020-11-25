SELECT 
    a.nameA, /* TableA.nameA */
    d.nameD /* TableD.nameD */
FROM TableA a 
    INNER JOIN TableB b on b.aID = a.aID 
    INNER JOIN TableC c on c.cID = b.cID 
    INNER JOIN TableD d on d.dID = a.dID 
WHERE DATE(c.`date`) = CURDATE()