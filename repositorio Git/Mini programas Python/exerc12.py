def quad(lado1, lado2, lado3, lado4):

    n = int(input("O quadrilátero possui ângulos retos?\n1. (sim)\n2. (não)\n\n"))
    if n == 1:
        q = int(input("Digite a quantidade de ângulos retos:\n"))

        if q == 4 and lado1 != lado2 == lado3 != lado4 and lado1 == lado4:
            return "retângulo"
        elif q == 4 and lado1 == lado2 == lado3 == lado4:
            return "quadrado"
        else:
            return "valores inválidos"
    else:
        if lado1 == lado2 == lado3 == lado4:
            return "losango"
        else:
            return "trapézio"


print("Digite o tamanho dos 4 lados de um quadrilátero:\n")
lado1 = int(input("Digite o tamanho do lado 1 do quadrilátero: "))
lado2 = int(input("Digite o tamanho do lado direito do quadrilátero: "))
lado3 = int(input("Digite o tamanho do lado esquerdo do quadrilátero: "))
lado4 = int(input("Digite o tamanho do lado 4 do quadrilátero: "))

print("O seu quadrilátero é um", quad(lado1, lado2, lado3, lado4))
