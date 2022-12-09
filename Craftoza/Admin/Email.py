import poplib
import string, random
import logging
import io

SERVER="pop.gmail.com"
USER="lloydcosta2002@gmail.com"
PASSWORD="Barcelona1234"

logging.debug('connect to '+SERVER)
server=poplib.POP3_SSL(SERVER)
logging.debug('log in')
server.user(USER)
server.pass_(PASSWORD)

# list items on server
logging.debug('listing emails')
resp, items, octets = server.list()

# download the first message in the list
id, size = string.split(items[0])
resp, text, octets = server.retr(id)

# convert list to Message object
text = string.join(text, "\n")
file = io.StringIO.StringIO(text)
message = io.rfc822.Message(file)

# output message
print(message['From']),
print(message['Subject']),
print(message['Date']),