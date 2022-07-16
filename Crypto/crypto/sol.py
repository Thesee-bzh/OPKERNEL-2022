#!/usr/bin/env python
# -*- coding: utf-8 -*-

def xor(a, b):
    res = []
    for ac, bc in zip(a, b):
        res.append(ac^bc)
    return res

def decrypt(ciphertext):
    seed = ciphertext[0:16]
    ctr = int.from_bytes(seed, 'big')

    plaintext = b''
    for i in range(16, len(ciphertext), 16):
        plaintext += bytes(xor(ciphertext[i:i+16], ctr.to_bytes(16, 'big')))
        ctr += 1
    return plaintext

with (open('CONFIDENTIEL.xlsx.enc', 'rb') as fin,
      open('CONFIDENTIEL.xlsx', 'wb') as fout
      ):
    fout.write(decrypt(fin.read()))




