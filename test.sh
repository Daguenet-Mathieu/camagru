set -a
source .env
set +a
echo $MAIL_PASSWORD $MAIL
curl -v --url "smtp://smtp.gmail.com:587" \
  --ssl-reqd \
  --mail-from "mdaguen@gmail.com" \
  --mail-rcpt "mathieu.daguenet@gmail.com" \
  --user "mdaguen@gmail.com:$MAIL_PASSWORD" \
  -T <(echo -e "From: $MAIL\nTo: mathieu.daguenet@gmail.com\nSubject: Test automatisation\n\nSalut Mathieu, ceci est un test d'automatisation.")
