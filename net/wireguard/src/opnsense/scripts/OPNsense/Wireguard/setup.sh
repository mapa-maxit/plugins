#!/bin/sh

mkdir -p /var/run/wireguard
chmod 755 /var/run/wireguard

# Create folder for client export and wipe it with every restart to track changes
mkdir -p /usr/local/etc/wireguard/clientexport
rm -f /usr/local/etc/wireguard/clientexport/*
