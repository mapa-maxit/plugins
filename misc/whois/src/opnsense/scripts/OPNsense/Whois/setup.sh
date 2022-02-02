#!/bin/sh

mkdir -p /var/run/Whois
chown -R Whois:Whois /var/run/Whois
chmod 755 /var/run/Whois

mkdir -p /var/lib/Whois
chown -R Whois:Whois /var/lib/Whois
chmod 755 /var/lib/Whois /var/lib
