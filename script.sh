#!/bin/bash

while read COL_1 COL_2 COL_3
do
   echo "COL1: $COL_1"
   echo "COL2: $COL_2"
   echo "COL3: $COL_3"
done < index.html
