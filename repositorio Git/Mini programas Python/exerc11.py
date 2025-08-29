def triangulo(a, b, c):
    if a == b and b == c:
        return "equilátero"
    elif b == c and c != a or a == b and b != c or a == c and c != b:
        return "isósceles"
    else:
        return "escaleno"

print("Digite a medida dos lados do triângulo:\n")
a = int(input("Base: "))
b = int(input("Lado direito: "))
c = int(input("Lado esquerdo: "))

print(triangulo(a, b, c))
