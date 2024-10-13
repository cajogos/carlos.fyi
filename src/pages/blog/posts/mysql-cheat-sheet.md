---
Headline: MySQL Cheat Sheet
Description: A cheat sheet with some tips and tricks to help with MySQL databases.
Author: carlos-ferreira
Date: 2019-08-23T21:15:00+00:00
DateUpdated: 2019-08-23T21:15:00+00:00
Categories: cheat-sheets, coding
FeaturedImage: /assets/imgs/blog/data-data-data.jpg
---

## MySQL tips and tricks

I have used MySQL for many years now and I feel like I keep coming back to the same tutorial pages for different things I come across.

This is why I decided to have my own cheat sheet where I can simply drop simple code snippets for whenever I need to do a repetitive task.

### Creating a new Database with a user

This one is particularly useful whenever I am working on a new project and need to quickly set-up a new database for it. I do not recommend just doing these steps for production environments though, so be careful!

1. Login to MySQL CLI:
   - `mysql -u USER -p`
2. Create the MySQL database:
   - `CREATE DATABASE db_name;`
3. Create the new user:
   - `CREATE USER carlos;`
4. Grant the privileges to this new user:
   - `GRANT ALL PRIVILEGES ON db_name.* TO carlos IDENTIFIED BY 'password1234';`
5. Flush the privileges:
   - `FLUSH PRIVILEGES;`

---

More tips and tricks will be added as needed.

I hope you find this as useful as I do, and if you have any suggestions or requests, leave a comment below.
