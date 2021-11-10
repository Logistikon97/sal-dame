# saludame
🔵DESCRIPTION🔵
IOT web project where text is sent through a web portal and displayed on an LCD screen using arduino. 👀 - if you don't want your eyes to burn ... View the content on pc or horizontally (There was not enough time to make it responsive 😓).

🔍 HOW TO RUN IT 🔍
To make this work, you have to run it on a web server. Using xampp is sufficient. Put the files in htdocs or wherever you need and configure the database that is in this repository.

❓ HOW DOES IT WORK? ❓
The operation is simple. In web side, you are asked to register and log in to access to send the text. Once there, you can write a text that will be sent to the database. Afterwards, the previously configured arduino will read that message through the TX.php file and display it on the LCD, refreshing every 5 seconds. When a new text is sent, the new one will overwrite the old one and follow the normal flow.
