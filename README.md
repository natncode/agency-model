# agency model

## Update the database

Following are the steps to updata a database:

1. Configure your local copy of agency-model to point to the production database
2. Run migrations run. This will update the database schema of the production database but will leave the inventory with code using the last database schema.
3. Update agency-inventory code to match the new database schema
4. Do the same for agency-front

## TODO

- Make an Inventory baed on Doctrine Connection so It can be just installed and easy to use in agency front
note: every new implementation of inventory (regardless the technology used) should provide its corresponding connection driver
