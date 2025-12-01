#!/bin/bash

# Script para verificar la codificación de archivos

echo "🔍 Verificando codificación de archivos..."
echo ""

found_issues=0

# Verificar archivos PHP y Blade
for file in $(find resources app config routes -type f \( -name "*.php" -o -name "*.blade.php" \) 2>/dev/null); do
    encoding=$(file -bi "$file" | grep -o 'charset=[^;]*' | cut -d= -f2)
    
    if [ "$encoding" != "utf-8" ] && [ "$encoding" != "us-ascii" ]; then
        echo "❌ $file: $encoding"
        found_issues=$((found_issues + 1))
    fi
done

# Verificar archivos JS y JSON
for file in $(find public resources -type f \( -name "*.js" -o -name "*.json" \) 2>/dev/null); do
    encoding=$(file -bi "$file" | grep -o 'charset=[^;]*' | cut -d= -f2)
    
    if [ "$encoding" != "utf-8" ] && [ "$encoding" != "us-ascii" ]; then
        echo "❌ $file: $encoding"
        found_issues=$((found_issues + 1))
    fi
done

echo ""
if [ $found_issues -eq 0 ]; then
    echo "✅ Todos los archivos tienen codificación correcta (UTF-8)"
else
    echo "⚠️  Se encontraron $found_issues archivo(s) con codificación incorrecta"
    echo ""
    echo "Para corregir, ejecuta:"
    echo "  iconv -f ISO-8859-1 -t UTF-8 <archivo> > <archivo>.tmp && mv <archivo>.tmp <archivo>"
fi
