# Crypto / crypto

## Challenge (100 points)
Vous avez réussi à obtenir l'accès au dossier où se situent les fichiers uploadés. Cependant, tous les fichiers sont chiffrés.
Fort heureusement, l'algorithme de chiffrement est présent dans le dossier, trouver un moyen de le déchiffrer.

Bien commencer: Essayez de vous attaquer à une partie de l'algorithme pour réduire le temps de calcul. 

## Inputs
- Python script: [encrypt.py](./encrypt.py)
- Encoded file: [CONFIDENTIEL.xlsx.enc](./CONFIDENTIEL.xlsx.enc)

## Solution
Looking at the `encrypt()` function, there's something obvisouly wrong: the `encryptedBlock` is never used ! So instead of `XORing` one block with the next one, as we would expect, it simply `XOR` each block with an incremented counter, seeded with `random.getrandbits(128).to_bytes(16, 'big')`. Result is that `encryptBlock()` is not used...
```python
def encrypt(self, plaintext):
    while len(plaintext)%16:
        plaintext += b'\0'

    ctr = random.getrandbits(128)

    encrypted = ctr.to_bytes(16, 'big')

    for i in range(0, len(plaintext), 16):
        encryptedBlock = self.encryptBlock(ctr.to_bytes(16, 'big'))
        encrypted += bytes(self.xor(plaintext[i:i+16], ctr.to_bytes(16, 'big')))
        ctr += 1
    return encrypted
```

Let's look at what that block encoding does for the first blocks:
```python
encrypted = ctr.to_bytes(16, 'big') # E0 = seed
encrypted += bytes(self.xor(plaintext[0:16], ctr.to_bytes(16, 'big'))) # E1 = P0^seed
ctr += 1
encrypted += bytes(self.xor(plaintext[16:32], ctr.to_bytes(16, 'big'))) # E2 = P1^(seed + 1)
ctr += 1
# (...)
```

Summary of the encryption algorithm, with `P0, P1, etc.` the Plaintext blocks of 16bytes and `E0, E1, etc.` the Encoded blocks of same size:
```
E0 = seed
E1 = P0^seed
E2 = P1^(seed + 1)
(...)
```

We can revert the algorithm as follow:
```
seed = E0
P0 = E1^seed
P1 = E2^(seed + 1)
(...)
```

Which we implement in the `decipher()` function below:
```python
def decrypt(ciphertext):
    seed = ciphertext[0:16]
    ctr = int.from_bytes(seed, 'big')

    plaintext = b''
    for i in range(16, len(ciphertext), 16):
        plaintext += bytes(xor(ciphertext[i:i+16], ctr.to_bytes(16, 'big')))
        ctr += 1
    return plaintext
```

Let's run out code and verify that we recovered the decrypted `Excel` file:
```shell
$ python3 sol.py
$ file CONFIDENTIEL.xlsx
CONFIDENTIEL.xlsx: Microsoft Excel 2007+
```

Finally open [CONFIDENTIEL.xlsx](./CONFIDENTIEL.xlsx) to get the flag:
```shell
$ sudo apt install libreoffice
(...)
$ libreoffice CONFIDENTIEL.xlsx
```

![excel.png](./excel.png)

## Python code
Complete solution in [sol.py](./sol.py)

## Flag
HACK{ImplementationErrorBreaksCiphers}
