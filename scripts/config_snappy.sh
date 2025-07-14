#!/bin/bash

SNAPPY_CONFIG="config/snappy.php"

# Verifica se o arquivo existe
if [ -f "$SNAPPY_CONFIG" ]; then
    echo "Atualizando caminhos dos binários wkhtmltopdf e wkhtmltoimage..."

    sed -i "s|'binary' => .*wkhtmltopdf[^']*'|'binary' => '/usr/bin/wkhtmltopdf',|g" "$SNAPPY_CONFIG"
    sed -i "s|'binary' => .*wkhtmltoimage[^']*'|'binary' => '/usr/bin/wkhtmltoimage',|g" "$SNAPPY_CONFIG"

    echo "Atualização concluída!"
else
    echo "Arquivo $SNAPPY_CONFIG não encontrado."
fi
