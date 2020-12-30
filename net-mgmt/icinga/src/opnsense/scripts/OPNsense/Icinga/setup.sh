#!/bin/sh

ICINGA_DIRS="/var/cache/icinga2 /var/lib/icinga2 /var/lib/icinga2/api /var/lib/icinga2/api/log /var/lib/icinga2/api/zones /var/lib/icinga2/api/zones-stage /var/lib/icinga2/certificate-requests /var/lib/icinga2/certs /var/log/icinga2 /var/log/icinga2/compat /var/log/icinga2/compat/archives /var/log/icinga2/crash /var/run/icinga2/cmd /var/run/icinga2 /var/spool/icinga2 /var/spool/icinga2/perfdata /var/spool/icinga2/tmp"
ICINGA_USER=icinga
ICINGA_GROUP=icinga

for DIR in ${ICINGA_DIRS}; do
	mkdir -p ${DIR}
	chmod -R 750 ${DIR}
	chown -R ${ICINGA_USER}:${ICINGA_GROUP} ${DIR}
done

/usr/local/bin/php /usr/local/opnsense/scripts/OPNsense/Icinga/generate_certs.php
