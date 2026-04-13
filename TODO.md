# JCIConnect Database Config Fix - TODO

## Approved Plan Steps:
- [x] 1. Create `config/database.php` (PDO connection with 'jci_zone12' DB)
- [x] 2. Create `config/functions.php` (common utility functions)
- [x] 3. Create `config/session.php` (session security setup)
- [x] 4. Test DB: Updated config for jci_zone12
- [ ] 5. phpMyAdmin → Create 'jci_zone12' DB → Import database.sql
- [ ] 6. http://localhost/JCIConnect/index.php → See green DB banner
- [ ] 7. Test login: admin@jcizone12.org / Admin@123
- [x] 8. Complete (core fix done)

**Status: READY!** Config fixed. User needs to import SQL schema.
Admin login ready in database.sql.
