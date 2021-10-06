# Apex Pizza House
It is a web application written in Laravel for a pizza store. It has multiple features.
# Features:
- User Authentication
- User Email Verification
- User can order, cancel order, manage cart
- Admin Panel
- Admin can manage orders i.e dispatch orders when they are ready
# How to Run on LocalHost
- Save this repo in xampp/htdocs.
- correctly connect database and gmail server (for mailing service) in env file
- run in terminal
```terminal
composer update
php artisan migrate:fresh --seed
php artisan serve
```
### User Login
#### User Login Details:
- Email ID: user@gmail.com
- Password: 1234
![user_login](https://user-images.githubusercontent.com/46279553/134494065-1be3dec9-90dd-45ff-a636-8220e6ef47b8.JPG)
### Margherita and farmhouse added 
![pizzas_added](https://user-images.githubusercontent.com/46279553/134494182-c7206797-1c2a-48b2-ad55-3ffb9a23ae5b.JPG)
### User Cart
![Cart](https://user-images.githubusercontent.com/46279553/134494247-c16bf621-37ab-4ce8-b752-b4fd8d96c66e.JPG)
### User Checked-out
![Order_Placed](https://user-images.githubusercontent.com/46279553/134494300-b23dc9bd-d97e-48e5-a17e-842d372b278e.JPG)
### Admin Login in incognito window
#### Admin Login Details:
- Email ID: admin@apexpizza.com
- Password: 1234
![admin_login](https://user-images.githubusercontent.com/46279553/134494352-9ff82746-8224-45bb-9220-b1097b62cfc4.JPG)
### Admin checks user's order in pending order
![pending_orders](https://user-images.githubusercontent.com/46279553/134494497-52ad53c2-9df7-40fb-b5ef-33e6334dbca8.JPG)
### Admin Dispatched order
![deliverd_admin](https://user-images.githubusercontent.com/46279553/134494619-5d02fc94-9713-42ec-9a11-d0c2d994b215.JPG)
### User refreshes to see delivered order
![delivered_user](https://user-images.githubusercontent.com/46279553/134494723-c7074261-5d5e-41f6-8ebf-489f152d027b.JPG)
### Email Verification email is sent but link not working
![verification-mail](https://user-images.githubusercontent.com/46279553/134494942-62ce7b5f-9cba-4d57-9fdb-44d1cd459003.JPG)
### After verfied from DB, order delivered and order cancelled emails are sent to users
![order_email](https://user-images.githubusercontent.com/46279553/134495002-656e24bc-8a5e-413c-bf45-0ec295a8d6ed.JPG)
