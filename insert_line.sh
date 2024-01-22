#!/bin/bash

# Specify the file, line to insert, and insertion position
file="$1"
line_to_insert="$2"
position="$3"

# Check if the file exists
if [[ ! -f "$file" ]]; then
  echo "Error: File '$file' does not exist."
  exit 1
fi

# Check if the position is valid
if [[ ! "$position" =~ ^[0-9]+$ ]]; then
  echo "Error: Position must be a positive integer."
  exit 1
fi

# Use sed to insert the line
sed -i "${position}i $line_to_insert" "$file"

echo "Line inserted successfully."
