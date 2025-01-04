import 'package:flutter/material.dart';
import 'package:saree3/data/models/product.dart';

class ProductCard extends StatelessWidget {
  final Product product;
  final Function() onTap;
  const ProductCard({super.key, required this.product, required this.onTap});

  @override
  Widget build(BuildContext context) {
    return Column(
      children: [
        InkWell(
          onTap: onTap,
          child: Padding(
            padding: const EdgeInsets.symmetric(horizontal: 15, vertical: 5),
            child: Container(
              decoration: BoxDecoration(
                  color: Theme.of(context).colorScheme.secondary,
                  borderRadius: BorderRadius.circular(10)),
              padding: const EdgeInsets.all(10),
              child: Row(
                children: [
                  Expanded(
                    child: Column(
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: [
                        Text(
                          product.name!,
                          style: Theme.of(context).textTheme.bodyMedium
                        ),
                        Text(
                          '\$${product.price}',
                          style: Theme.of(context).textTheme.bodySmall,
                        ),
                        const SizedBox(
                          height: 15,
                        ),
                        Text(
                          product.description!,
                          style:
                              Theme.of(context).textTheme.bodySmall!.copyWith(
                                    color: Theme.of(context)
                                        .colorScheme
                                        .inverseSurface,
                                  ),
                        ),
                      ],
                    ),
                  ),
                  const SizedBox(
                    width: 10,
                  ),
                  ClipRRect(
                    borderRadius: BorderRadius.circular(8),
                    child: Image.network(
                      'https://placehold.co/500x500.png',
                      width: 100,
                    ),
                  ),
                ],
              ),
            ),
          ),
        ),
        Divider(
          indent: 20,
          endIndent: 20,
          color: Theme.of(context).colorScheme.inverseSurface,
        )
      ],
    );
  }
}
