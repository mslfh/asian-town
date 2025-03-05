# Asian Town Admin System

## Purpose

This system uses laravel+vite framework, also use starter kit Jetstream and add Quasar plugin to enhance Vite. Asian Town Admin System is created for Asian Town Supermarket, used to manage the backend data and provide virtual dashboard for manager. Also provide API for Frontend app.

## Function Desc

### User manage: 
    Admin - Manage all,add purchaser and generate invite code, add staff
    Staff - View all goods, and limits for delivery etc.
    Purchaser - View all goods, place purchase order, check delivery

### Goods manage:
    Manage information of all goods in market. 
    Bulk import and export

### Delivery manage:
    Manage delivery staff: 
        Create delivery record from Purchaser order and edit, trash
    Generate delivery sheet in PDF and export

    Delivery status manage

# Frontend app （not this app）

## Purchaser order process

Login by invite code created by admin.

1. View goods
2. Add into checkout
3. Confirm order
4. Check delivery status when waiting
5. Check and confirm delivered goods by order
6. Create delivery template
7. Timing order and notification
