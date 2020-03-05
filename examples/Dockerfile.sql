FROM mariadb:10.4

# I know that you can just add a volume
COPY --chown=root:root sql/init-db.sql /docker-entrypoint-initdb.d/init-db.sql
