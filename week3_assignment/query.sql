SELECT C.customerID, C.emailAddress, C.firstName, C.lastName, A.line1, A.city, A.state, A.zipCode, A.phone from customers C
INNER JOIN addresses A
ON C.customerID = A.customerID
GROUP BY A.zipCode